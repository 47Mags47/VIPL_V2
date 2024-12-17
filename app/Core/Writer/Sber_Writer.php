<?php

namespace App\Core\Writer;

use App\Core\Writer\Base\XML;
use App\Models\Main\Raport;
use Illuminate\Support\Collection;

class Sber_Writer extends XML
{
    public const ENCODING = 'windows-1251';
    public const NAME_PATTERN = 'f8615(###).xml';

    public function write(Collection $data): Raport
    {
        $this->setData($data);

        $this->writer->startElement('СчётПК');
        $this->setHeaderAttributes();
        $this->writePaymentInfo();
        $this->writeFooter();
        $this->writer->endElement();

        return $this->saveFile();
    }

    public function setHeaderAttributes()
    {
        $this->writer->writeAttribute('ДатаФормирования', $this->event->date->format('Y-m-d'));
        $this->writer->writeAttribute('НаименованиеОрганизации',    $this->contract ? $this->contract->division_name : '');
        $this->writer->writeAttribute('ИНН',                        $this->contract ? $this->contract->INN : '');
        $this->writer->writeAttribute('РасчетныйСчетОрганизации',   $this->contract ? $this->contract->number : '');
        $this->writer->writeAttribute('БИК',                        $this->contract ? $this->contract->BIK : '');
        $this->writer->writeAttribute('ИдПервичногоДокумента',      str_pad($this->registy_code, 3, '0', STR_PAD_LEFT));
        $this->writer->writeAttribute('НомерРеестра',               str_pad($this->registy_code, 3, '0', STR_PAD_LEFT));
        $this->writer->writeAttribute('ДатаРеестра', $this->event->date->format('Y-m-d'));
    }

    public function writePaymentInfo()
    {
        $this->writer->startElement('ЗачислениеЗарплаты');

        foreach ($this->data as $key => $row) {
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

    public function writeFooter()
    {
        $this->writer->writeElement('ВидЗачисления', 'XXX');
        $this->writer->writeElement('ДатаПлатежногоПоручения', $this->event->date->format('Y-m-d'));
        $this->writer->startElement('КонтрольныеСуммы');
        $this->writer->writeElement('КоличествоЗаписей', $this->data->count());
        $this->writer->writeElement('СуммаИтого', number_format($this->data->sum('summ'), 2, '.', ''));
        $this->writer->endElement();
    }
}
