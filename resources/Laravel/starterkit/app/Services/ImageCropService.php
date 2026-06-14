<?php

namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;

class ImageCropService
{
    private ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new GdDriver());
    }

    /**
     * Crop and resize an image to exact output dimensions.
     *
     * @param  string  $sourcePath  Path to the source image file
     * @param  int  $cropX  Crop origin x on the original image (pixels)
     * @param  int  $cropY  Crop origin y on the original image (pixels)
     * @param  int  $cropW  Crop width on the original image (pixels)
     * @param  int  $cropH  Crop height on the original image (pixels)
     * @param  int  $outputWidth  Final output width
     * @param  int  $outputHeight  Final output height
     * @return string  Path to temp output file (caller must delete after use)
     */
    public function cropAndResize(
        string $sourcePath,
        int $cropX,
        int $cropY,
        int $cropW,
        int $cropH,
        int $outputWidth,
        int $outputHeight
    ): string {
        $image = $this->manager->read($sourcePath);

        // Apply EXIF orientation before cropping
        $image->orient();

        $image->crop($cropW, $cropH, $cropX, $cropY);
        $image->resize($outputWidth, $outputHeight);

        $tempPath = sys_get_temp_dir().'/fw_crop_'.uniqid().'.jpg';
        $image->toJpeg(92)->save($tempPath);

        return $tempPath;
    }

    /**
     * Apply EXIF orientation to an image and save it back (or to a new path).
     * Returns the path (same or new temp file).
     */
    public function orientate(string $sourcePath): string
    {
        $image = $this->manager->read($sourcePath);
        $image->orient();

        $tempPath = sys_get_temp_dir().'/fw_orient_'.uniqid().'.jpg';
        $image->toJpeg(92)->save($tempPath);

        return $tempPath;
    }
}
