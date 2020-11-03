<?php

namespace Module\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboards';

    protected $fillable = [
        'class_name',
        'sort_order',
    ];

    public function author()
    {
        return $this->morphTo();
    }
}
