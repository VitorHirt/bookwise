<?php

namespace App\Controllers\Admin;

class DashboardController {
    public function index(): void {
        view('dashboard', 'admin', [], 'layouts.layout');
    }
}
