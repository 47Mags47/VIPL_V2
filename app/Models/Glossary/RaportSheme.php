<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class RaportSheme extends Model
{
    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__raport_shemes',
        $primaryKey = 'code',
        $guarded = [];
}
