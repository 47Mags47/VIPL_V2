<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__divisions',
        $primary = 'code';
}
