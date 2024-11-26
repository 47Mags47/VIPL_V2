<?php

namespace App\Models\Main;

use App\Models\Glossary\PackageFileStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFile extends Model
{
    use HasFactory, HasUuids;

    ### Настройки
    ##################################################
    protected
        $table = 'main__package_files';

    public
        $timestamps = false;


    ### Функции
    ##################################################

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(PackageFileStatus::class, 'status_code', 'code');
    }

    public function data()
    {
        return $this->hasMany(PackageData::class, 'file_id', 'id');
    }

    public function scopeErrors()
    {
        $counter = 0;
        foreach ($this->data as $row) {
            $counter = $counter + ($row->errors ? collect($row->errors)->count() : 0);
        }
        return $counter;
    }
}
