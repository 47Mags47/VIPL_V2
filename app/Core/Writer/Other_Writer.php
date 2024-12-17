<?php

namespace App\Core\Writer;

use App\Core\Writer\Base\XLS;
use Illuminate\Support\Collection;

class Other_Writer extends XLS
{
    public const NAME_PATTERN = 'sp(bank_code)_(###).xls';
    public const HEADERS = ['NPP', 'FIO', 'LSH', 'SUMMA', 'DTR', 'PNM', 'KBK'];

    public function write(Collection $data)
    {
        $this->setData($data);
        $this->writeBody();
        $this->writeFooter();
        return $this->saveFile();
    }
    public function writeBody()
    {
        $data = $this->data->map(function ($row, $i) {
            return [
                0 => $i + 1,
                1 => str_replace('  ', ' ', "$row->first_name $row->last_name $row->middle_name"),
                2 => $row->account,
                3 => $row->summ,
                4 => $row->birth,
                5 => $row->pasp,
                6 => $row->kbk
            ];
        })->toArray();
        $this->activeSheet->fromArray($data, null, 'A2');
    }

    public function writeFooter()
    {
        $row_count = $this->data->count();

        $this->activeSheet->setCellValue("A" . $row_count + 2, 'ИТОГО:');
        $this->activeSheet->mergeCells('A' . $row_count + 2 . ':C' . $row_count + 1);
        $this->activeSheet->setCellValue("D" . $row_count + 2, number_format($this->data->sum('summ'), 2, '.', ''));
    }
}
