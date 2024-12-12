<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class PackageDataColumn extends Model
{
    public
    $timestamps = false,
    $incrementing = false;

protected
    $table = 'glossary__package__data_columns',
    $primaryKey = 'code',
    $guarded = [];
}
