<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__payments',
        $primaryKey = 'code',
        $guarded = [];
}
