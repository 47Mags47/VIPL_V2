<?php

namespace App\Traits;

use App\Abstracts\QuerySort;
use Illuminate\Database\Eloquent\Builder;

trait HasSort
{
    public function scopeSort(Builder $builder): Builder
    {
        if(property_exists($this, 'sort_class')){
            $sort = new $this->sort_class();
            return $sort->apply($builder);
        }else{
            return request()->has('sort')
                ? $builder->orderBy(request()->get('sort'), request()->get('direction') ?? 'asc')
                : $builder;
        }
    }
}
