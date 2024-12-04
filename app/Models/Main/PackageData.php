<?php

namespace App\Models\Main;

use App\Sorts\PackageDataSort;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageData extends Model
{
    use HasFactory, HasSearch, HasSort;

    ### Настройки
    ##################################################
    protected
        $table = 'main__package__data',
        $guarded = [];

    public
        $timestamps = false,
        $sort_class = PackageDataSort::class,
        $search_columns = ['last_name', 'first_name', 'middle_name', 'account', 'summ', 'pasp', 'kbk', 'snils'],
        $casts = [
            'errors' => 'array'
        ];

    ### Функции
    ##################################################
    public function scopeSetError($query, string $error)
    {
        $this->update(['errors' => [$error]]);
    }

    public function scopeAddError($query, string $error)
    {
        $this->update(['errors' => array_merge($this->errors, [$error])]);
    }

    ### Связи
    ##################################################
}
