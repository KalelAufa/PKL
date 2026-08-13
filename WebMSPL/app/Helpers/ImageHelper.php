<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Save an uploaded image file as WebP format.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory Absolute path to save directory (e.g. public_path('images'))
     * @return string The saved filename (without path)
     */
    public static function saveAsWebP($file, string $directory): string
    {
        $filename = \Illuminate\Support\Str::uuid() . '.webp';

        // Determine source type
        $extension = strtolower($file->getClientOriginalExtension());

        // Create GD resource from source
        $image = match ($extension) {
            'jpeg', 'jpg' => imagecreatefromjpeg($file->getPathname()),
            'png'         => self::createFromPng($file->getPathname()),
            'gif'         => imagecreatefromgif($file->getPathname()),
            'webp'        => imagecreatefromwebp($file->getPathname()),
            default       => self::createFromAny($file->getPathname()),
        };

        if (! $image) {
            throw new \RuntimeException("Failed to convert image: {$file->getClientOriginalName()}");
        }

        // Preserve transparency for PNG/GIF/WebP sources
        if (in_array($extension, ['png', 'gif', 'webp'])) {
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }

        imagewebp($image, $directory . DIRECTORY_SEPARATOR . $filename, 80);
        imagedestroy($image);

        \Illuminate\Support\Facades\Log::info('Image converted to WebP', [
            'original' => $file->getClientOriginalName(),
            'saved'    => $filename,
            'size_kb'  => round(filesize($directory . DIRECTORY_SEPARATOR . $filename) / 1024, 1),
        ]);

        return $filename;
    }

    private static function createFromPng(string $path)
    {
        $image = imagecreatefrompng($path);
        if ($image) {
            // Convert to true color to enable WebP with transparency
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }
        return $image;
    }

    private static function createFromAny(string $path)
    {
        // Fallback: try to get image info and create from known type
        $info = getimagesize($path);
        if (! $info) {
            return false;
        }
        return match ($info[2]) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($path),
            IMAGETYPE_PNG  => imagecreatefrompng($path),
            IMAGETYPE_GIF  => imagecreatefromgif($path),
            IMAGETYPE_WEBP => imagecreatefromwebp($path),
            default        => false,
        };
    }
}
