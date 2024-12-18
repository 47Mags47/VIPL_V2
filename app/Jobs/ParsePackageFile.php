<?php

namespace App\Jobs;

use App\Core\Reader\CSVReader;
use App\Models\Glossary\PackageDataColumn;
use App\Models\Main\PackageData;
use App\Models\Main\PackageFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ParsePackageFile implements ShouldQueue
{
    use Queueable;

    public $columns = null;

    /**
     * Create a new job instance.
     */
    public function __construct(public PackageFile $file, array $columns = null)
    {
        $this->columns = $columns;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $reader = new CSVReader(Storage::disk('package_files')->path($this->file->path));
        $data = $reader->read();
        foreach ($data as $row) {
            $data_row = new PackageData(['file_id' => $this->file->id]);
            try {
                foreach (PackageDataColumn::all()->toArray() as $column) {
                    $data_row->{$column['code']} = $row[array_flip($this->columns)[$column['code']]];
                }
            } catch (\Throwable $th) {
                Log::error($th);
                $data_row->status_code = 'parse_error';
            }
            $data_row->save();
        }

        ValidatePackageData::dispatch($this->file);
    }
}
