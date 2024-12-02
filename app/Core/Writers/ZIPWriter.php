<?php

namespace App\Core\Writers;

use App\Models\Main\Raport;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZIPWriter
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public static function write(array $files, string $file_name, $path)
    {
        $zip = new ZipArchive();
        $zip->open(Storage::disk('raports')->path($path) . '/' . $file_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        foreach ($files as $path) {
            $zip->addFile(Storage::disk('raports')->path($path), basename($path));
        }
        $zip->close();
    }
}
