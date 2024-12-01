<?php

namespace App\Core\Writers;

use App\Models\Main\PackageFile;
use App\Models\Main\Raport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use XMLWriter as GlobalXMLWriter;

class XMLWriter
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public static function write(PackageFile $file)
    {
        $Writer = new GlobalXMLWriter();

        ### Настройка файла
        ##################################################
        $Writer->openMemory();
        $Writer->startDocument('1.0', 'windows-1251');
        $Writer->setIndent(true);
        $Writer->setIndentString('    ');

        ### Создание XML
        ##################################################
        $Writer->startElement('СчетаПК');
        $Writer->writeAttribute('ДатаФормирования', $file->package->event->date->format('Y-m-d'));
        $Writer->writeAttribute('НомерДоговора', $file->bank->contract->number);
        $Writer->writeAttribute('НаименованиеОрганизации', $file->bank->contract->division_name);
        $Writer->writeAttribute('ИНН', $file->bank->contract->INN);
        $Writer->writeAttribute('РасчетныйСчетОрганизации', $file->bank->contract->division_account);
        $Writer->writeAttribute('БИК', $file->bank->contract->BIK);
        $Writer->writeAttribute('ИдПервичногоДокумента', 'XXX');                        // XXX
        $Writer->writeAttribute('НомерРеестра', 'XXX');                                 // XXX
        $Writer->writeAttribute('ДатаРеестра', $file->package->event->date->format('Y-m-d'));

        $Writer->startElement('ЗачислениеЗарплаты');
        foreach ($file->data as $key => $row) {
            $Writer->startElement('Сотрудник');
            $Writer->writeAttribute('Нпп', $key + 1);
            $Writer->writeElement('Фамилия',        $row->last_name         ?? "");
            $Writer->writeElement('Имя',            $row->first_name        ?? "");
            $Writer->writeElement('Отчество',       $row->middle_name       ?? "");
            $Writer->writeElement('ОтделениеБанка', 8615);
            $Writer->writeElement('ЛицевойСчет',    $row->account           ?? "");
            $Writer->writeElement('Сумма',          $row->summ              ?? "");
            $Writer->endElement();
        }
        $Writer->endElement();

        $Writer->writeElement('ВидЗачисления', 'XXX');  // XXX
        $Writer->writeElement('ДатаПлатежногоПоручения', $file->package->event->date->format('Y-m-d')); // XXX

        $Writer->startElement('КонтрольныеСуммы');
        $Writer->writeElement('КоличествоЗаписей', $file->data->count());
        $Writer->writeElement('СуммаИтого', number_format($file->allSumm(), 2, '.', ''));
        $Writer->endElement();

        $Writer->endDocument();

        ### Запись в файл
        ##################################################
        $file_name = $file->package->event->payment_code . '_' . $file->package->division_code . '_' . $file->bank_code . '.xml';
        $file_path = $file->package->event->payment_code . '/' . $file->package->division_code . '/' . $file->bank_code . '/' . $file_name;

        Storage::disk('raports')->put($file_path, $Writer->outputMemory());
        $Writer->flush();

        return $file_path;
    }
}
