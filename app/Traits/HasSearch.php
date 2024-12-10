<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeSearch(Builder $builder){
        return $builder->Where(function($query){
            $phrase = request()->search ?? '';
            foreach ($this->search_columns ?? [] as $column) {
                $query->orWhereLike($column, '%' . $phrase . '%');
            }
        });
    }
}
