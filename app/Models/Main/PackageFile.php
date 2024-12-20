<?php

namespace App\Models\Main;

use App\Models\Glossary\Bank;
use App\Models\Glossary\PackageFileStatus;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFile extends Model
{
    use HasFactory, HasUuids, HasSearch, HasSort;

    ### Настройки
    ##################################################
    protected
        $table = 'main__package__files',
        $guarded = [];

    public
        $search_columns = ['id'];

    ### Функции
    ##################################################
    public function scopeSetStatus($builder, string $status)
    {
        $this->update(['status_code' => $status]);
    }

    public function scopeAllSumm()
    {
        return $this->hasMany(PackageData::class, 'file_id', 'id')->sum('summ');
    }

    public function scopeErrors()
    {
        $errors = collect([]);
        foreach ($this->data as $row) {
            if ($row->errors !== null) $errors->push($row->errors);
        }
        return $errors;
    }

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(PackageFileStatus::class, 'status_code', 'code');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_code', 'code');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function data()
    {
        return $this->hasMany(PackageData::class, 'file_id', 'id');
    }

    public function uploadUser(){
        return $this->belongsTo(User::class, 'upload_user_id');
    }
}
