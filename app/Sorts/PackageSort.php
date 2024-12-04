<?php

namespace App\Sorts;

use App\Abstracts\QuerySort;
use Illuminate\Database\Eloquent\Builder;

class PackageSort extends QuerySort
{
    protected const SORT_DEFAULT = 'division';
    protected const DIRECTION_DEFAULT = 'asc';

    public function id(string $direction): Builder
    {
        return $this->builder->orderBy('id', $direction);
    }

    public function status(string $direction){
        return $this->builder->orderBy('status_code', $direction);
    }

    public function division(string $direction){
        return $this->builder->orderBy('division_code', $direction);
    }
}
