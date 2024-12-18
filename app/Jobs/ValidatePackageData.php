<?php

namespace App\Jobs;

use App\Core\PackageDataValidator;
use App\Models\Glossary\PackageDataColumn;
use App\Models\Main\PackageFile;
use App\Models\Main\ValidatorRule;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ValidatePackageData implements ShouldQueue
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
        $file = $this->file;
        $rules = ValidatorRule::all();
        $columns = PackageDataColumn::all();

        foreach ($columns as $column) {
            $nullable = $rules
                ->where('type_code', '=', 'nullable')
                ->where('column_code', '=', $column->code)
                ->count() > 0;

            foreach ($file->data as $row) {
                $value = $row->{$column->code};
                if ($nullable and $value === null) continue;

                foreach ($rules->where('column_code', '=', $column->code) as $rule) {
                    if (method_exists(PackageDataValidator::class, $rule->type_code)){
                        if(!PackageDataValidator::{$rule->type_code} ($rule, $row)){
                            $this->addError($rule, $row);
                            continue 3;
                        }
                    }
                }
            }
        }
    }

    private function addError($rule, $row)
    {
        $error = $rule->type->error_pattern;
        $error = str_replace(':Attribute', $rule->column->name, $error);
        $error = str_replace(':Value', $rule->value, $error);

        $errors = array_merge($row->errors ?? [], [$error]);
        $row->update(['errors' => $errors]);
    }
}
