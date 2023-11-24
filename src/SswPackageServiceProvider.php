<?php

namespace SmartSellWeb\SswPackage;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SmartSellWeb\SswPackage\Commands\SswPackageCommand;

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
            ->name('ssw-package')
            ->hasConfigFile();
            #->hasViews()
            #->hasMigration('create_ssw-package-local_table')
            #->hasCommand(SswPackageCommand::class);
    }
}
