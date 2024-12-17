<?php

namespace App\Models\Glossary;

use App\Models\Main\CalendarEvent;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Bank extends Model
{
    use SoftDeletes, HasSort, HasSearch;

    public
        $timestamps = false,
        $incrementing = false,
        $search_columns = ['code', 'ru_code', 'name'];

    protected
        $table = 'glossary__banks',
        $primaryKey = 'code',
        $guarded = [];

    public function scopeWriteRaport($query, CalendarEvent $event, array|Collection $data){
        $writer_name = $this->sheme !== null
            ? $this->sheme->class ?? 'App\Core\Writer\\' . $this->sheme->code . '_Writer'
            : 'App\Core\Writer\Other_Writer';

        if(class_exists($writer_name)){
            $writer = new $writer_name ($this, $event);
            return $writer->write($data);
        }
    }

    public function contracts(){
        return $this->hasMany(Contract::class, 'bank_code', 'code');
    }

    public function sheme(){
        return $this->belongsTo(RaportSheme::class, 'raport_sheme_code', 'code');
    }
}
