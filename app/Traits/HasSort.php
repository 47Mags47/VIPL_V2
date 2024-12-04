<?php

namespace App\Traits;

use App\Abstracts\QuerySort;
use Illuminate\Database\Eloquent\Builder;

trait HasSort
{
    public function scopeSort(Builder $builder, $request): Builder
    {
        $sort = new $this->sort_class($request);
        return $sort->apply($builder);
    }
}
