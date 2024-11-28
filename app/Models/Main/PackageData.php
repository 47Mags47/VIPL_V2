<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageData extends Model
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected
        $table = 'main__package__data',
        $guarded = [];

    public
        $timestamps = false,
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
