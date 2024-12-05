<?php

namespace SassLaravel\LaravelEnumsToJson;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SassLaravel\LaravelEnumsToJson\Commands\LaravelEnumsToJsonCommand;

class LaravelEnumsToJsonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-enums-to-json')
            ->hasConfigFile()
            ->hasRoute('api')
            ->hasMigration('create_posts_related_tables')
            ->hasCommand(LaravelEnumsToJsonCommand::class);
    }
}
