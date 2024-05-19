<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentShield\Facades\FilamentShield;
use Str;

class CustomPermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        FilamentShield::configurePermissionIdentifierUsing(
            function ($resource) {
                return \Str::of($resource::getModel())
                    ->afterLast('\\')
                    ->lower()
                    ->toString();
            }
        );

    }
}
