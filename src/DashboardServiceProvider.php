<?php

namespace Modules\Dashboard;

use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Models\Dashboard;
use Modules\Dashboard\Repositories\DashboardRepositoryInterface;
use Modules\Dashboard\Repositories\Eloquents\DashboardRepository;

class DashboardServiceProvider extends ServiceProvider
{
    public function getModuleNamespace()
    {
        return 'dashboard';
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/dnsoft/dashboard'),
        ], 'dashboard');


        $this->app->singleton(DashboardRepositoryInterface::class, function () {
            return new DashboardRepository(new Dashboard());
        });

        $this->app->singleton('dashboard', function () {
            return new DashboardManager();
        });
    }

    public function register()
    {
    }

}
