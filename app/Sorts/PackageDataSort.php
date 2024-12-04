<?php

namespace App\Sorts;

use App\Abstracts\QuerySort;
use Illuminate\Database\Eloquent\Builder;

class PackageDataSort extends QuerySort
{
    protected const SORT_DEFAULT = 'last_name';
    protected const DIRECTION_DEFAULT = 'asc';

    public function last_name(string $direction): Builder
    {
        return $this->builder->orderBy('last_name', $direction);
    }

    public function errors(string $direction){
        return $this->builder->orderBy('errors', $direction);
    }

}

