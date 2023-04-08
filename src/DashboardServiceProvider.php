<?php

namespace Module\Dashboard;

use DnSoft\Core\Events\CoreAdminMenuRegistered;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Module\Dashboard\Models\Dashboard;
use Module\Dashboard\Repositories\DashboardRepositoryInterface;
use Module\Dashboard\Repositories\Eloquents\DashboardRepository;
use Module\Dashboard\Dashboards\ProfileDashboard;
use Module\Dashboard\Facades\Dashboard as DashboardFC;

class DashboardServiceProvider extends ServiceProvider
{
  public function getModuleNamespace(): string
  {
    return 'dashboard';
  }

  public function boot()
  {
    $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
    $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard');
    $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'dashboard');
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

    $this->publishes([
      __DIR__ . '/../public' => public_path('vendor/dashboard'),
    ], 'dashboard');

    $this->publishes([
      __DIR__ . '/../config/dashboard.php' => config_path('dashboard.php'),
    ], 'dashboard-config');


    $this->app->singleton(DashboardRepositoryInterface::class, function () {
      return new DashboardRepository(new Dashboard());
    });

    $this->app->singleton('dashboard', function () {
      return new DashboardManager();
    });

    $this->registerAdminMenu();
    $this->registerDashboard();
  }

  public function register()
  {
    parent::register();
    $this->mergeConfigFrom(realpath(__DIR__ . '/../config/dashboard.php'), 'dashboard');
  }

  public function registerAdminMenu()
  {
    Event::listen(CoreAdminMenuRegistered::class, function ($menu) {
      $menu->add(__('dashboard::message.menu.dashboard'), [
        'url'  => 'admin',
        'style' => 'width: 140px'
      ])->data('order', 1000)->data('icon', 'fa fa-home');
    });
  }

  protected function registerDashboard()
  {
    DashboardFC::push(ProfileDashboard::class);
  }
}
