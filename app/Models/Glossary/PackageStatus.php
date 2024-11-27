<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class PackageStatus extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__package__statuses',
        $primary = 'code';
}
