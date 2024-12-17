<?php

namespace App\Core\Writer\Base;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZIP
{
    public function __construct(array|string $path, string $disk = null) {}

    public static function make(string $path, array|Collection|string $files, string $disk = null)
    {
        $files = is_string($files) ? collect([$files]) : $files;
        $files = is_array($files) ? collect($files) : $files;

        $zip = new ZipArchive();
        $zip->open($path, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $files->each(function ($file) use ($zip, $disk) {
            $file_path = ($disk !== null)
                ? Storage::disk($disk)->path($file)
                : $file;
            $file_name = ($disk !== null)
                ? $file
                : basename($file);
            $zip->addFile($file_path, $file_name);
        });

        $zip->close();
        return $zip;
    }
}
