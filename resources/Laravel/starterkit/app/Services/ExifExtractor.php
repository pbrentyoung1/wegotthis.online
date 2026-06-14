<?php

namespace App\Services;

use Carbon\Carbon;

class ExifExtractor
{
    public function extract(string $filePath): array
    {
        $exif = @exif_read_data($filePath, null, false);

        if (! $exif) {
            return $this->empty();
        }

        return [
            'exif_taken_at'      => $this->parseDateTime($exif['DateTimeOriginal'] ?? $exif['DateTime'] ?? null),
            'exif_gps_lat'       => $this->parseGps($exif['GPSLatitude'] ?? null, $exif['GPSLatitudeRef'] ?? null),
            'exif_gps_lng'       => $this->parseGps($exif['GPSLongitude'] ?? null, $exif['GPSLongitudeRef'] ?? null),
            'exif_device_make'   => $this->clean($exif['Make'] ?? null),
            'exif_device_model'  => $this->clean($exif['Model'] ?? null),
            'exif_width'         => isset($exif['ExifImageWidth']) ? (int) $exif['ExifImageWidth'] : null,
            'exif_height'        => isset($exif['ExifImageLength']) ? (int) $exif['ExifImageLength'] : null,
            'exif_orientation'   => isset($exif['Orientation']) ? (int) $exif['Orientation'] : null,
            'exif_aperture'      => $this->parseAperture($exif['FNumber'] ?? null),
            'exif_shutter_speed' => $this->parseShutterSpeed($exif['ExposureTime'] ?? null),
            'exif_iso'           => isset($exif['ISOSpeedRatings']) ? (int) $exif['ISOSpeedRatings'] : null,
        ];
    }

    private function empty(): array
    {
        return array_fill_keys([
            'exif_taken_at', 'exif_gps_lat', 'exif_gps_lng',
            'exif_device_make', 'exif_device_model',
            'exif_width', 'exif_height', 'exif_orientation',
            'exif_aperture', 'exif_shutter_speed', 'exif_iso',
        ], null);
    }

    private function parseDateTime(?string $value): ?Carbon
    {
        if (! $value) {
            return null;
        }

        try {
            // EXIF format: "2026:06:15 10:30:00"
            return Carbon::createFromFormat('Y:m:d H:i:s', $value);
        } catch (\Throwable) {
            return null;
        }
    }

    private function parseGps(?array $dms, ?string $ref): ?float
    {
        if (! $dms || count($dms) < 3) {
            return null;
        }

        $deg = $this->rationalToFloat($dms[0]);
        $min = $this->rationalToFloat($dms[1]);
        $sec = $this->rationalToFloat($dms[2]);

        $decimal = $deg + ($min / 60) + ($sec / 3600);

        if ($ref && in_array(strtoupper($ref), ['S', 'W'], true)) {
            $decimal = -$decimal;
        }

        return round($decimal, 7);
    }

    private function rationalToFloat(string|array $value): float
    {
        if (is_array($value)) {
            // Already parsed as array by some PHP versions
            return isset($value[0]) ? $this->rationalToFloat($value[0]) : 0.0;
        }

        if (str_contains($value, '/')) {
            [$num, $den] = explode('/', $value, 2);

            return $den != 0 ? (float) $num / (float) $den : 0.0;
        }

        return (float) $value;
    }

    private function parseAperture(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $f = $this->rationalToFloat(is_string($value) ? $value : (string) $value);

        return $f > 0 ? 'f/'.number_format($f, 1) : null;
    }

    private function parseShutterSpeed(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $s = $this->rationalToFloat(is_string($value) ? $value : (string) $value);

        if ($s <= 0) {
            return null;
        }

        if ($s >= 1) {
            return number_format($s, 1).'s';
        }

        return '1/'.round(1 / $s).'s';
    }

    private function clean(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim($value);

        return $value !== '' ? $value : null;
    }
}
