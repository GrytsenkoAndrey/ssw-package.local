<?php

namespace SmartSellWeb\SswPackage;

use SmartSellWeb\SswPackage\Commands\SswPackageCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SswPackageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ssw-package-local')
            ->hasConfigFile();
        //->hasViews()
        //->hasMigration('create_ssw-package-local_table')
        //->hasCommand(SswPackageCommand::class);
    }
}
