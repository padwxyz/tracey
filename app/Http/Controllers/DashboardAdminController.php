<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // $admin = Admin::all();
        $title = 'Admin Management Data';
        return view('pages.admin.dashboard_admin', compact('title'));
    }
}
