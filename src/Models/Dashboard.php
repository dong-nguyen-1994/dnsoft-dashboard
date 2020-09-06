<?php

namespace Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboards';

    protected $fillable = [
        'class_name',
        'sort_order',
    ];
}
