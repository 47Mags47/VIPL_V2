<?php

namespace App\Models\Glossary;

use App\Sorts\DivisionSort;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasSort, HasSearch;

    public
        $timestamps = false,
        $incrementing = false,
        $search_columns = ['code', 'name'];

    protected
        $table = 'glossary__divisions',
        $primaryKey = 'code',
        $guarded = [];
}
