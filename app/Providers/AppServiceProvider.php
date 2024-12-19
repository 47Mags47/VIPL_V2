<?php

namespace App\Providers;

use App\Models\Main\User;
use App\Policies\FilePolicy;
use App\Policies\PackageFilePolicy;
use App\Policies\PackagePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('package-view', [PackagePolicy::class, 'view']);
        Gate::define('package-file-view', [PackageFilePolicy::class, 'view']);
    }
}
