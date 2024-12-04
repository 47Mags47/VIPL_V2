<?php

namespace App\Models\Main;

use App\Models\Glossary\Bank;
use App\Models\Glossary\PackageFileStatus;
use App\Sorts\PackageFileSort;
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

    public $sort_class = PackageFileSort::class, $search_columns = ['id'];

    ### Функции
    ##################################################
    public function scopeSetStatus($builder, string $status){
        $this->update(['status_code' => $status]);
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

    public function scopeAllSumm(){
        return $this->hasMany(PackageData::class, 'file_id', 'id')->sum('summ');
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
