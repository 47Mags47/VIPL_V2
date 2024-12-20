<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QuerySort
{
    protected Builder $builder;
    protected string $sortBy;
    protected string $sortDirection;

    protected const SORT_DEFAULT = 'created_at';
    protected const DIRECTION_DEFAULT = 'desc';

    public function __construct()
    {
        $request = request();
        $this->sortBy = $request->get('sort', static::SORT_DEFAULT);
        $this->sortDirection = $request->get('direction', static::DIRECTION_DEFAULT);
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        if (method_exists($this, $this->sortBy)) {
            call_user_func_array([$this, $this->sortBy], ['direction' => $this->sortDirection]);
        }else{
            $this->builder->orderBy($this->sortBy, $this->sortDirection);
        }

        return $this->builder;
    }

    public static function getSortableFields(): array
    {
        $abstractMethods = get_class_methods(self::class);
        $methods = get_class_methods(static::class);
        return array_diff($methods, $abstractMethods);
    }
}
