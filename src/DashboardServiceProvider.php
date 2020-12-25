<?php

namespace Module\Dashboard;

use Dnsoft\Core\Events\CoreAdminMenuRegistered;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Module\Dashboard\Models\Dashboard;
use Module\Dashboard\Repositories\DashboardRepositoryInterface;
use Module\Dashboard\Repositories\Eloquents\DashboardRepository;
use Module\Dashboard\Dashboards\WelcomeDashboard;
use Module\Dashboard\Dashboards\ProfileDashboard;
use Module\Dashboard\Facades\Dashboard as DashboardFC;

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
            __DIR__.'/../public' => public_path('vendor/dashboard'),
        ], 'dashboard');

        $this->app->singleton(DashboardRepositoryInterface::class, function () {
            return new DashboardRepository(new Dashboard());
        });

        $this->app->singleton('dashboard', function () {
            return new DashboardManager();
        });

        $this->registerAdminMennu();
        $this->registerDashboard();
    }

    public function registerAdminMennu()
    {
        Event::listen(CoreAdminMenuRegistered::class, function ($menu) {
            $menu->add(__('dashboard::message.menu.dashboard'), ['url'  => 'admin'])->data('order', 1000)->prepend('<i class="fas fa-igloo"></i>');
        });
    }

    protected function registerDashboard()
    {
        DashboardFC::push(ProfileDashboard::class);
        DashboardFC::push(WelcomeDashboard::class);
    }

}
