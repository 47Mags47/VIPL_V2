<?php

namespace App\Models\Glossary;

use Illuminate\Database\Eloquent\Model;

class ValidatorType extends Model
{
    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__validator_types',
        $primaryKey = 'code';
}
