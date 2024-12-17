<?php

namespace App\Core\Writer\Base;

use App\Abstracts\Writer;
use App\Models\Glossary\Bank;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Raport;
use Illuminate\Support\Facades\Storage;
use XMLWriter;

abstract class XML extends Writer
{
    public const VERSION = '1.0';
    public const ENCODING = 'UTF-8';
    public const USE_INDENT = true;
    public const INDENT = '    ';

    protected $writer;

    public function __construct(Bank $bank, CalendarEvent $event)
    {
        parent::__construct($bank, $event);
        $this->initXML();
    }

    public function initXML()
    {
        $this->writer = new XMLWriter();
        $this->writer->openMemory();
        $this->writer->startDocument($this::VERSION, $this::ENCODING);
        $this->writer->setIndent($this::USE_INDENT);
        $this->writer->setIndentString($this::INDENT);
    }

    public function saveFile(): Raport
    {
        Storage::disk('raports')->put($this->path . '/' . $this->file_name, $this->writer->outputMemory());

        $this->raport->name = $this->file_name;
        $this->raport->save();
        return $this->raport;
    }
}
