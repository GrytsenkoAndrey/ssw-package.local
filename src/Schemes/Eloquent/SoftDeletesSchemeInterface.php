<?php

namespace SmartSellWeb\SswPackage\Schemes\Eloquent;

interface SoftDeletesSchemeInterface
{
    /**
     * Table columns schema / Entity properties schema
     */
    public const COLUMN_DELETED_AT = 'deleted_at';
}
