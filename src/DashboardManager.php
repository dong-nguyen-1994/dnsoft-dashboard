<?php

namespace Module\Dashboard;

use Illuminate\Support\Collection;

class DashboardManager
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var $collections
     */
    protected $collections;

    /**
     * @param $dashboardClassName
     * @return $this
     */
    public function push($dashboardClassName)
    {
        $this->items[] = $dashboardClassName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $this->load();
        return $this->collections;
    }

    public function load()
    {
        if (!$this->collections) {
            $this->collections = new Collection();
            foreach (array_unique($this->items) as $item) {
                if (class_exists($item)) {
                    /** @var DashboardInterface $dashboard */
                    $dashboard = new $item;
                    $this->collections->put($dashboard->id(), new $dashboard);
                }
            }
        }
    }
}
