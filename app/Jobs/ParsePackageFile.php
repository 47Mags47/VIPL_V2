<?php

namespace App\Jobs;

use App\Models\Main\PackageData;
use App\Models\Main\PackageFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ParsePackageFile implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public PackageFile $file) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        $reader
            ->setInputEncoding('CP866')
            ->setDelimiter(';')
            ->setEnclosure('')
            ->setSheetIndex(0);

        $path = Storage::disk('package_files')->path($this->file->path);
        $spreadsheet = $reader->load($path);

        try {
            $rows = $spreadsheet->getActiveSheet()->toArray();
        } catch (\Throwable $th) {
            $this->file->setStatus('parse_error');
            Log::error($th);
        }

        if (isset($rows)) foreach ($rows as $row) {
            $data_row = PackageData::create([
                'file_id' => $this->file->id
            ]);
            try {
                $data_row->update([
                    'first_name' => $row[2],
                    'last_name' => $row[1],
                    'middle_name' => $row[3],
                    'account' => $row[4],
                    'summ' => $row[5],
                    'pasp' => $row[6],
                    'birth' => $row[7],
                    'kbk' => $row[8],
                    'snils' => $row[9],
                ]);
                $this->file->setStatus('check');
            } catch (\Throwable $th) {
                $this->file->setStatus('parse_error');
                $data_row->setError('Невозможно прочитать строку');
                Log::error($th);
            }
        }
    }
}
