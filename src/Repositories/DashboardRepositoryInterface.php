<?php

namespace Module\Dashboard\Repositories;

use DnSoft\Core\Repositories\BaseRepositoryInterface;

interface DashboardRepositoryInterface extends BaseRepositoryInterface
{
    public function myDashboard();
}
