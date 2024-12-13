<?php

namespace App\Core\Writer;

use App\Abstracts\XMLWriter;
use App\Models\Main\PackageFile;
use App\Models\Main\Raport;

class XML_Default_Writer extends XMLWriter
{
    public const ENCODING = 'windows-1251';
    public $file;

    public function writeHeader(){

        $this->writer->writeAttribute('ДатаФормирования', $this->file->package->event->date->format('Y-m-d'));
        $this->writer->writeAttribute('НаименованиеОрганизации', '');
        $this->writer->writeAttribute('ИНН', '');
        $this->writer->writeAttribute('РасчетныйСчетОрганизации', '');
        $this->writer->writeAttribute('БИК', '');
        $this->writer->writeAttribute('ИдПервичногоДокумента', '');
        $this->writer->writeAttribute('НомерРеестра', '');
        $this->writer->writeAttribute('ДатаРеестра', $this->file->package->event->date->format('Y-m-d'));
    }

    public function writeBody(){
        $this->writer->startElement('ЗачислениеЗарплаты');
        foreach ($this->file->data as $key => $row) {
            $this->writer->startElement('Сотрудник');
            $this->writer->writeAttribute('Нпп', $key + 1);
            $this->writer->writeElement('Фамилия',        $row->last_name         ?? "");
            $this->writer->writeElement('Имя',            $row->first_name        ?? "");
            $this->writer->writeElement('Отчество',       $row->middle_name       ?? "");
            $this->writer->writeElement('ОтделениеБанка', 8615);
            $this->writer->writeElement('ЛицевойСчет',    $row->account           ?? "");
            $this->writer->writeElement('Сумма',          $row->summ              ?? "");
            $this->writer->endElement();
        }
        $this->writer->endElement();
    }

    public function writeFooter(){
        $this->writer->writeElement('ВидЗачисления', 'XXX');
        $this->writer->writeElement('ДатаПлатежногоПоручения', $this->file->package->event->date->format('Y-m-d'));

        $this->writer->startElement('КонтрольныеСуммы');
        $this->writer->writeElement('КоличествоЗаписей', $this->file->data->count());
        $this->writer->writeElement('СуммаИтого', number_format($this->file->allSumm(), 2, '.', ''));
        $this->writer->endElement();
    }

    public function createRaport(){
        $path = $this->file->package->event->payment() . '/' . $this->file->package->division_code;
        $filename = $this->file->bank->code . '.xml';

        return $this->save($path, $filename)
            ? Raport::create([
                'name' => $filename,
                'path' => $path,
                'description' => 'Отчет для ' . $this->file->bank_code . ' банка на ' . now()->format('Y_m_d__H:i:s'),
            ])
            : false;
    }

    public function write(PackageFile $file)
    {
        $this->file = $file;

        $this->writer->startElement('СчетаПК');
        $this->writeHeader();
        $this->writeBody();
        $this->writeFooter();
        $this->writer->endElement();

        return $this->createRaport();
    }
}
