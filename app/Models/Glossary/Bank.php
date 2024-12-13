<?php

namespace App\Models\Glossary;

use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function contracts(){
        return $this->hasMany(Contract::class, 'bank_code', 'code');
    }

    public function sheme(){
        return $this->belongsTo(RaportSheme::class, 'raport_sheme_code', 'code');
    }
}
