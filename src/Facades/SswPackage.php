<?php

namespace SmartSellWeb\SswPackage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SmartSellWeb\SswPackage\SswPackage
 */
class SswPackage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SmartSellWeb\SswPackage\SswPackage::class;
    }
}
