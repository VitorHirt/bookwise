<?php

namespace App\Controllers\Admin;

class SettingsController {
    public function index(): void {
        view('settings', 'admin', [], 'layouts.layout');
    }
}
