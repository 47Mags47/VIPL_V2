<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFile extends Model
{
    use HasFactory;

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
    public function data(){
        return $this->hasMany(PackageData::class, 'file_uuid', 'uuid');
    }
}