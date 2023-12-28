<?php

namespace Module\Dashboard\Dashboards;

use Module\Dashboard\DashboardItem;

class ProfileDashboard extends DashboardItem
{
    public function col()
    {
        return 4;
    }

    public function name()
    {
        return 'Profile';
    }

    public function toHtml()
    {
        
        return view("dashboard::dashboards.profile");
    }
}
