<?php

namespace App\Abstracts;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use XMLWriter as GlobalXMLWriter;

abstract class XMLWriter
{
    public const VERSION = '1.0';
    public const ENCODING = 'UTF-8';
    public const USE_INDENT = true;
    public const INDENT = '    ';

    public const DISK = 'raports';

    public $writer;

    public function __construct()
    {
        $this->writer = new GlobalXMLWriter();
        $this->writer->openMemory();

        ### Настройка файла
        ##################################################
        $this->writer->startDocument($this::VERSION, $this::ENCODING);
    }

    public function close(){
        $this->writer->endDocument();
    }

    public function save(string|null $path = null, string|null $filename = null){
        $path = $path ?? 'custom_raport';
        $filename = $filename ?? Str::uuid() . '.xml';

        return Storage::disk($this::DISK)->put($path . '/' . $filename, $this->writer->outputMemory());
    }
}
