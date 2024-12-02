<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__payments',
        $primary = 'code';
}
