<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__divisions',
        $primaryKey = 'code',
        $guarded = [];
}
