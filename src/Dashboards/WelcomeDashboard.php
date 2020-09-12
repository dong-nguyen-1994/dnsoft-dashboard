<?php

namespace Modules\Dashboard\Dashboards;

use Modules\Dashboard\DashboardItem;

class WelcomeDashboard extends DashboardItem
{

    public function name()
    {
        return 'Welcome';
    }

    public function toHtml()
    {
        return view('dashboard::dashboards.welcome');
    }
}
