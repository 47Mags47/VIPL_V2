<?php

namespace App\Traits;

trait HasSearch
{
    public function scopeSearch(){
        return $this->where(function($query){
            $phrase = request()->search ?? '';
            foreach ($this->search_columns ?? [] as $column) {
                $query->orWhereLike($column, '%' . $phrase . '%');
            }
        });
    }
}
