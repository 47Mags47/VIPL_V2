<?php

namespace App\Models\Glossary;

use App\Sorts\DivisionSort;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

    public
        $timestamps = false,
        $incrementing = false;

    protected
        $table = 'glossary__user__roles',
        $primaryKey = 'code',
        $guarded = [];
}
