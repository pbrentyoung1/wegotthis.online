<?php

namespace App\Services;

use App\Models\MediaFile;

class MediaFileMetadataWriter
{
    /**
     * Write custom metadata (caption, tags, notes) into a JPEG file as IPTC data.
     *
     * Returns path to the annotated file (may be a temp file — caller must delete).
     */
    public function write(MediaFile $mediaFile, string $sourcePath): string
    {
        // Only JPEG supports PHP's iptcembed()
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($sourcePath);

        if ($mime !== 'image/jpeg') {
            // For non-JPEG, return unchanged (IPTC write deferred to post-MVP)
            return $sourcePath;
        }

        $iptcData = [];

        if ($mediaFile->caption) {
            // IPTC 2:120 = Caption/Abstract
            $iptcData['2#120'] = [$mediaFile->caption];
        }

        if (! empty($mediaFile->tags)) {
            // IPTC 2:025 = Keywords (one entry per keyword)
            $iptcData['2#025'] = $mediaFile->tags;
        }

        if ($mediaFile->notes) {
            // IPTC 2:040 = Special Instructions
            $iptcData['2#040'] = [$mediaFile->notes];
        }

        if (empty($iptcData)) {
            return $sourcePath;
        }

        $iptcRaw = '';
        foreach ($iptcData as $tag => $values) {
            [$record, $dataset] = explode('#', $tag);
            foreach ($values as $value) {
                $len = strlen($value);
                $iptcRaw .= "\x1c".chr((int) $record).chr((int) $dataset).chr($len >> 8).chr($len & 0xff).$value;
            }
        }

        $content = iptcembed($iptcRaw, $sourcePath);

        if ($content === false) {
            return $sourcePath;
        }

        $tempPath = sys_get_temp_dir().'/fw_iptc_'.uniqid().'.jpg';
        file_put_contents($tempPath, $content);

        return $tempPath;
    }
}
