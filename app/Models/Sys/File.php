<?php

namespace App\Models\Sys;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasUuids;

    public
        $timestamps = false;

    protected
        $table = 'sys__files',
        $guarded = [];
}
