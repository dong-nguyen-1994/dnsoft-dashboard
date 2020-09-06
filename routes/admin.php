<?php

use Dnsoft\Dashboard\Http\Controllers\Admin\DashboardController;

Route::prefix(config('core.admin_prefix'))->middleware(['web', 'admin.auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('dashboard/setting',  [DashboardController::class, 'setting'])->name('admin.dashboard.setting');
    Route::post('dashboard/save', [DashboardController::class, 'save'])->name('admin.dashboard.save');
});
