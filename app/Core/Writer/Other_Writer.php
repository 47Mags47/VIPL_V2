<?php

namespace App\Core\Writer;

use App\Abstracts\XLSWriter;
use App\Models\Main\PackageFile;
use App\Models\Main\Raport;

class Other_Writer extends XLSWriter
{
    public function write(PackageFile $file){
        $this->setHeaders(['NPP', 'FIO', 'LSH', 'SUMMA', 'DTR', 'PNM', 'KBK']);
        $this->setBody($file->data);
        $this->setFooter($file->allSumm());

        $path = $file->package->event->payment() . '/' . $file->package->division_code;
        $filename = $file->bank->code . '.xls';
        $this->save($path, $filename);

        return Raport::create([
            'name' => $filename,
            'path' => $path,
            'description' => 'Отчет для ' . $file->bank_code . ' банка на ' . now()->format('Y_m_d__H:i:s')  . '.xls',
        ]);
    }
}
