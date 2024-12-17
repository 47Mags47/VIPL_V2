<?php

namespace App\Core\Writer\Base;

use App\Abstracts\Writer;
use App\Models\Glossary\Bank;
use App\Models\Main\CalendarEvent;
use Illuminate\Support\Facades\Storage;

abstract class XLS extends Writer
{
    protected $spreadsheet, $activeSheet;
    public const HEADERS = [];

    public function __construct(Bank $bank, CalendarEvent $event)
    {
        parent::__construct($bank, $event);
        $this->initXLS();
    }

    public function initXLS()
    {
        $this->spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $this->activeSheet = $this->spreadsheet->getActiveSheet();

        foreach ($this::HEADERS as $cell => $header) {
            $this->activeSheet->setCellValue([$cell + 1, 1], $header);
        }
    }

    public function saveFile()
    {
        Storage::disk('raports')->makeDirectory($this->path);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($this->spreadsheet);
        $writer->save(Storage::disk('raports')->path($this->path . '/' . $this->file_name));

        $this->raport->name = $this->file_name;
        $this->raport->save();

        return $this->raport;
    }
}
