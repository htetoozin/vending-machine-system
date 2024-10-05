<?php

namespace App\Filters;

// use FocusBeauty\Api\Filters\Filters;

class ProductFilter extends Filters
{

    /**
     * Register filter properties
     */
    protected $filters = [
        'order_by',
    ];

    /**
     * Filter by slider name.
     */
    public function order_by($value)
    {
        return $this->builder->orderBy('name', $value);
    }
}
