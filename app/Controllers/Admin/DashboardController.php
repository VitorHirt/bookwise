<?php

namespace App\Controllers\Admin;

class DashboardController {
    public function index(): void {
        $data['teste'] = 'teste';
        view('dashboard', 'admin', $data, 'layouts.layout');
    }
}
