<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class RaportShemeType extends Model
{
    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__raport_sheme_types',
        $primaryKey = 'code',
        $guarded = [];
}
