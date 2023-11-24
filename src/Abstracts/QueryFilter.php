<?php
declare(strict_types=1);

namespace SmartSellWeb\SswPackage\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected Builder $builder;

    public function __construct(protected Request $request)
    {
    }

    public function apply(Builder $builder): void
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = ucwords($field);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }
    }

    protected function fields(): array
    {
        return array_filter(
            array_map('trim', $this->request->all())
        );
    }
}
