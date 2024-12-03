<?php

namespace App\Traits;

trait HasSearch
{
    public function scopeSearch($query, string|null $search_phrase = ''){
        return $this->where(function($query) use ($search_phrase){
            foreach ($this->search_columns as $column) {
                $query->orWhereLike($column, '%' . $search_phrase . '%');
            }
        });
    }
}
