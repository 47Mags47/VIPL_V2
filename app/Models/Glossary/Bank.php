<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__banks',
        $primary = 'code';

    public function contract(){
        return $this->belongsTo(Contract::class, 'code', 'bank_code');
    }
}
