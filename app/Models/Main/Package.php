<?php

namespace App\Models\Main;

use App\Models\Glossary\PackageStatus;
use App\Models\Main\PackageFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected
        $table = 'main__packages',
        $primary = 'uuid';

    ### Функции
    ##################################################
    public static function setStatus($query, PackageStatus $status){
        $query->update(['status_code' => $status->code]);
    }

    ### Связи
    ##################################################
    public function status()
    {
        return $this->belongsTo(PackageStatus::class, 'status_code', 'code');
    }

    public function event()
    {
        return $this->belongsTo(PackageStatus::class, 'event_id');
    }

    public function files()
    {
        return $this->hasMany(PackageFile::class, 'package_uuid', 'uuid');
    }
}
