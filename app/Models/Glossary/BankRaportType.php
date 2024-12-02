<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class BankRaportType extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__bank_raport_types',
        $primary = 'code';
}
