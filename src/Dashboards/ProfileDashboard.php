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
        $version = get_version_actived();
        return view("dashboard::$version.dashboards.profile");
    }
}
