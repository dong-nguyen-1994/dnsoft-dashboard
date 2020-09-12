<?php

namespace Modules\Dashboard\Dashboards;

use Modules\Dashboard\DashboardItem;

class ProfileDashboard extends DashboardItem
{
    public function name()
    {
        return 'Profile';
    }

    public function toHtml()
    {
        return view('dashboard::dashboard.profile');
    }
}
