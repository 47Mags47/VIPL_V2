<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class PackageFileStatus extends Model
{
    public $timestamps = false;

    protected
        $table = 'glossary__package__file_statuses',
        $primary = 'code';
}
