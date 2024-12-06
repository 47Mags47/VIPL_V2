<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;

    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__banks',
        $primaryKey = 'code',
        $guarded = [];

    public function contract(){
        return $this->belongsTo(Contract::class, 'code', 'bank_code');
    }
}
