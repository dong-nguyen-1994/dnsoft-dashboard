<?php

namespace Module\Dashboard\Repositories;

use Dnsoft\Core\Repositories\BaseRepositoryInterface;

interface DashboardRepositoryInterface extends BaseRepositoryInterface
{
    public function myDashboard();
}
