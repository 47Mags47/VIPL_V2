<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageData extends Model
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected $table = 'main__package_data';

    public
        $timestamps = false,
        $casts = [
            'errors' => 'array',
            'birth' => 'date'
        ];

    ### Функции
    ##################################################

    ### Связи
    ##################################################
}
