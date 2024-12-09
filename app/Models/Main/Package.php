<?php

namespace App\Models\Main;

use App\Models\Glossary\Division;
use App\Models\Glossary\PackageStatus;
use App\Models\Main\PackageFile;
use App\Sorts\PackageSort;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory, HasUuids, HasSearch, HasSort;

    ### Настройки
    ##################################################
    protected
        $table = 'main__packages';
    public
        $search_columns = ['id'];

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
        return $this->belongsTo(CalendarEvent::class, 'event_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_code', 'code');
    }

    public function files()
    {
        return $this->hasMany(PackageFile::class, 'package_id', 'id')->orderBy('created_at');
    }

    public function data(){
        return $this->through('files')->has('data');
    }
}
