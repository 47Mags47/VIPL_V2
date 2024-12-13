<?php

namespace App\Core\Writer;

use App\Models\Main\PackageFile;
use App\Models\Main\Raport;
use Illuminate\Support\Facades\Storage;

class UralSib_Writer
{
    public $file_path, $file;
    private $path, $filename;

    public function write(PackageFile $file)
    {
        $this->file = $file;
        $this->path = $file->package->event->payment() . '/' . $file->package->division_code;
        $this->filename = $file->bank->code . '.txt';
        $this->file_path = $this->path . '/' . $this->filename;

        $first_row =  $this->getHeader();
        Storage::disk('raports')->put($this->file_path, $first_row);

        foreach ($file->data as $row) {
            $this->writeRow($row->toArray());
        }

        return $this->createRaport();
    }

    public function getHeader()
    {
        $row_count = str_pad(iconv('UTF-8', 'CP866', $this->file->data()->count()), 5, ' ', STR_PAD_LEFT);
        $xxx_1 = str_pad(iconv('UTF-8', 'CP866', '5555746'), 10);
        $summ = str_pad(iconv('UTF-8', 'CP866', number_format($this->file->allSumm(), 2, '.', '')), 12, ' ', STR_PAD_LEFT);
        $xxx_2 = iconv('UTF-8', 'CP866', 'z');

        $full_str = $row_count . $xxx_1 . $summ . $xxx_2;

        return $full_str;
    }

    public function writeRow(array $data)
    {
        $first_name = str_pad(iconv('UTF-8', 'CP866', $data['first_name']), 20);
        $last_name = str_pad(iconv('UTF-8', 'CP866', $data['last_name']), 20);
        $middle_name = str_pad(iconv('UTF-8', 'CP866', $data['middle_name']), 20);
        $account = str_pad(iconv('UTF-8', 'CP866', $data['account']), 20);
        $summ = str_pad(iconv('UTF-8', 'CP866', number_format($data['summ'], 2, '.', '')), 12, ' ', STR_PAD_LEFT);
        $xxx_1 = str_pad(iconv('UTF-8', 'CP866', '10'), 10);
        $xxx_2 = iconv('UTF-8', 'CP866', '0.002');

        $row = $first_name . $last_name . $middle_name . $account . $summ . $xxx_1 . $xxx_2;

        Storage::disk('raports')->append($this->file_path, $row);
    }

    public function createRaport()
    {
        return Raport::create([
            'name' => $this->filename,
            'path' => $this->path,
            'description' => '55557461015.I00',
        ]);
    }
}
