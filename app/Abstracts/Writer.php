<?php

namespace App\Abstracts;

use App\Models\Glossary\Bank;
use App\Models\Glossary\Contract;
use App\Models\Main\CalendarEvent;
use App\Models\Main\Raport;
use Illuminate\Support\Collection;

abstract class Writer
{
    protected $bank, $event;
    protected $contract, $registy_code, $raport;
    protected $file_name, $path;
    protected $data;

    public const NAME_PATTERN = 'empty_name';
    /**
     * Создание документа
     */
    public function __construct(Bank $bank, CalendarEvent $event)
    {
        $this->setBank($bank);
        $this->setEvent($event);
        $this->setPath();
        $this->setContract();
        $this->setRegistryNumber();
        $this->setFileName();
        $this->setRaport();
    }

    /**
     * Функция записи в файл
     * @return Raport
     */
    abstract public function write(Collection $data);

    private function setBank(Bank $bank)
    {
        $this->bank = $bank;
    }

    private function setEvent(CalendarEvent $event)
    {
        $this->event = $event;
    }

    private function setPath()
    {
        $this->path = $this->event->date->format('Y-m-d') . '/' . $this->event->payment_code . '/' . $this->bank->code;
    }

    private function setContract()
    {
        $this->contract = Contract::where('bank_code', $this->bank->code)
            ->where('payment_code', $this->event->payment_code)
            ->get()
            ->first();
    }

    protected function setRegistryNumber()
    {
        $sumbol_count = substr_count($this::NAME_PATTERN, '#');
        $search_str = preg_replace('/\(#*\)/', '%', $this::NAME_PATTERN);

        $file_count = Raport::where('payment_code', $this->event->payment_code)
            ->whereBetween('date', [$this->event->date->startOfYear(), $this->event->date->endOfYear()])
            ->whereLike('name', $search_str)
            ->count();

        $this->registy_code = str_pad($file_count + 1, $sumbol_count, '0', STR_PAD_LEFT);
    }

    protected function setFileName(string $name = null)
    {
        if ($name !== null) {
            $this->file_name = $name;
            return;
        }

        $name = $this::NAME_PATTERN;
        $name = preg_replace('/\(#*\)/', $this->registy_code, $name);
        $name = preg_replace('/\(bank_code\)/', $this->bank->code, $name);

        $this->file_name = $name;
    }

    protected function setData(array|Collection $data)
    {
        $this->data = is_array($data) ? collect($data) : $data;
    }

    private function setRaport()
    {
        $this->raport = new Raport([
            'path' => $this->path,
            'date' => $this->event->date,
            'payment_code' => $this->event->payment_code,
            'bank_code' =>  $this->bank->code
        ]);
    }
}
