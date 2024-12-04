<?php

namespace App\Sorts;

use App\Abstracts\QuerySort;
use Illuminate\Database\Eloquent\Builder;

class PackageFileSort extends QuerySort
{
    protected const SORT_DEFAULT = 'bank';
    protected const DIRECTION_DEFAULT = 'asc';

    public function id(string $direction): Builder
    {
        return $this->builder->orderBy('id', $direction);
    }

    public function bank(string $direction){
        return $this->builder->orderBy('bank_code', $direction);
    }

    public function status(string $direction){
        return $this->builder->orderBy('status_code', $direction);
    }

    public function created(string $direction){
        return $this->builder->orderBy('created_at', $direction);
    }
}
