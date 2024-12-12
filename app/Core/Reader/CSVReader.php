<?php

namespace App\Core\Reader;

use PhpOffice\PhpSpreadsheet\Reader\Csv;

class CSVReader
{
    public
        $rowCount;

    private
        $reader,
        $spreadsheet,
        $sheet;

    public function __construct(public string $path)
    {
        $this->reader = new Csv();
        $this->reader
            ->setInputEncoding('CP866')
            ->setDelimiter(';')
            ->setEnclosure('')
            ->setSheetIndex(0);
        $this->spreadsheet = $this->reader->load($path);
        $this->sheet = $this->spreadsheet->getActiveSheet();
        $this->rowCount = $this->sheet->getHighestRow();
    }

    public function read(int|null $row_count = null)
    {
        $row_count = $row_count ?? $this->sheet->getHighestRow();
        return array_slice($this->sheet->toArray(), 0, $row_count);
    }

    public function readRow(int $row = 0, int $row_count = 1){
        return array_slice($this->sheet->toArray(), $row, $row_count);
    }


    public function getPreviewData()
    {
        // $reader = new CSVReader($path);
        return $this->read(5);
    }

    public function getLastRow()
    {
        // $reader = new CSVReader($path);
        return $this->readRow($this->rowCount - 1)[0];
    }
}
