<?php

namespace Module\Dashboard\Http\Controllers\Admin;

use Module\Dashboard\Facades\Dashboard;
use Illuminate\Routing\Controller;
use Module\Dashboard\Repositories\DashboardRepositoryInterface;

class DashboardController extends Controller
{
    /**
     * @var DashboardRepositoryInterface
     */
    private $dashboardRepository;

    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index()
    {
        $myItems = $this->dashboardRepository->myDashboard()->pluck('class_name')->toArray();

        $myItems = $myItems ?: Dashboard::onlyCanAccess()->keys()->toArray();

        $myDashboard = Dashboard::only($myItems);

        return view('dashboard::admin2.index', compact('myDashboard'));
    }

    public function setting()
    {
        return view('dashboard::admin2.setting');
    }

    public function save()
    {

    }
}
