<?php

namespace App\Core\Writer;

use App\Abstracts\Writer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class UralSib_Writer extends Writer
{
    public const NAME_PATTERN = '55557461209.I(##)';

    public function write(Collection $data)
    {
        $this->setData($data);
        $this->writeHeaders();
        $this->writeBody();

        return $this->saveFile();
    }

    private function writeRow(string $row)
    {
        Storage::disk('raports')->exists($this->path . '/' . $this->file_name)
            ? Storage::disk('raports')->append($this->path . '/' . $this->file_name, $row)
            : Storage::disk('raports')->put($this->path . '/' . $this->file_name, $row);
    }

    private function writeHeaders()
    {
        $row_count = str_pad(iconv('UTF-8', 'CP866', $this->data->count()), 5, ' ', STR_PAD_LEFT);
        $xxx_1 = str_pad(iconv('UTF-8', 'CP866', '5555746'), 10);
        $summ = str_pad(iconv('UTF-8', 'CP866', number_format($this->data->sum('summ'), 2, '.', '')), 12, ' ', STR_PAD_LEFT);
        $xxx_2 = iconv('UTF-8', 'CP866', 'z');

        $full_str = $row_count . $xxx_1 . $summ . $xxx_2;
        $this->writeRow($full_str);
    }

    private function writeBody()
    {
        $this->data->each(function ($row) {
            $first_name = str_pad(iconv('UTF-8', 'CP866', $row->first_name), 20);
            $last_name = str_pad(iconv('UTF-8', 'CP866', $row->last_name), 20);
            $middle_name = str_pad(iconv('UTF-8', 'CP866', $row->middle_name), 20);
            $account = str_pad(iconv('UTF-8', 'CP866', $row->account), 20);
            $summ = str_pad(iconv('UTF-8', 'CP866', number_format($row->summ, 2, '.', '')), 12, ' ', STR_PAD_LEFT);
            $xxx_1 = str_pad(iconv('UTF-8', 'CP866', '10'), 10);
            $xxx_2 = iconv('UTF-8', 'CP866', '0.002');

            $full_row = $first_name . $last_name . $middle_name . $account . $summ . $xxx_1 . $xxx_2;
            $this->writeRow($full_row);
        });
    }

    private function saveFile()
    {
        $this->raport->name = $this->file_name;
        $this->raport->save();
        return $this->raport;
    }
}
