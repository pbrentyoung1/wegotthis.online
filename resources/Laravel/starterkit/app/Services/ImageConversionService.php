<?php

namespace App\Services;

use RuntimeException;

class ImageConversionService
{
    /**
     * Normalize an uploaded image file to a storage-ready JPEG or PNG.
     *
     * Returns ['path' => string, 'mime' => string, 'temp' => bool].
     * If 'temp' is true, the caller must delete the file after use.
     *
     * @throws RuntimeException if HEIC file cannot be converted
     */
    public function normalize(string $sourcePath, string $originalMime): array
    {
        $detectedMime = $this->detectMime($sourcePath);

        if (in_array($detectedMime, ['image/heic', 'image/heif'], true)) {
            return $this->convertHeic($sourcePath);
        }

        if (! in_array($detectedMime, ['image/jpeg', 'image/png', 'image/webp', 'image/gif'], true)) {
            throw new RuntimeException("Unsupported image format: {$detectedMime}");
        }

        return ['path' => $sourcePath, 'mime' => $detectedMime, 'temp' => false];
    }

    private function detectMime(string $path): string
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);

        return $finfo->file($path) ?: 'application/octet-stream';
    }

    private function convertHeic(string $sourcePath): array
    {
        if (! extension_loaded('imagick')) {
            throw new RuntimeException(
                'HEIC files require ImageMagick with libheif support, which is not available on this server. '.
                'On iPhone, go to Settings → Camera → Formats → Most Compatible to upload as JPEG instead.'
            );
        }

        $imagick = new \Imagick();
        $imagick->readImage($sourcePath);
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompressionQuality(92);

        $tempPath = sys_get_temp_dir().'/fw_'.uniqid().'.jpg';
        $imagick->writeImage($tempPath);
        $imagick->clear();

        return ['path' => $tempPath, 'mime' => 'image/jpeg', 'temp' => true];
    }
}
