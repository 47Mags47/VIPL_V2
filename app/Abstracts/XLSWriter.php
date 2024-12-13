<?php

namespace App\Abstracts;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

abstract class XLSWriter
{
    private $spreadsheet, $activeSheet;

    public function __construct()
    {
        $this->spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $this->activeSheet = $this->spreadsheet->getActiveSheet();
    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $cell => $header) {
            $this->activeSheet->setCellValue([$cell + 1, 1], $header);
        }
    }

    public function setBody(array|Collection $data)
    {
        $xls_data = $data->map(function ($row, $i) {
            return [
                0 => $i + 1,
                1 => strtoupper($row->first_name) . ' ' . strtoupper($row->last_name) . ' ' . strtoupper($row->middle_name),
                2 => $row->account ? "'" . $row->account : '',
                3 => number_format($row->summ, 2, ',', ''),
                4 => Carbon::parse($row->birth)->format('d.m.Y'),
                5 => $row->pasp ? "'" . $row->pasp : '',
                6 => $row->kbk ? "'" . $row->kbk : '',
            ];
        })->toArray();
        $this->activeSheet->fromArray($xls_data, null, 'A2');
    }

    public function setFooter(float $summ)
    {
        $row_count = $this->activeSheet->getHighestRow();

        $this->activeSheet->setCellValue("A" . $row_count + 1, 'ИТОГО:');
        $this->activeSheet->mergeCells('A' . $row_count + 1 . ':C' . $row_count + 1);
        $this->activeSheet->setCellValue("D" . $row_count + 1, number_format($summ, 2, ',', ''));
    }

    public function save(string|null $path = null, string|null $filename = null)
    {
        $path = $path ?? 'custom_raport';
        $filename = $filename ?? Str::uuid() . '.xls';
        $full_path = Storage::disk('raports')->path($path . '/' . $filename);
        // dd($full_path);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->spreadsheet);
        $writer->save($full_path);
    }
}
