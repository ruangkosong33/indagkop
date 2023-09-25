<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard=Dashboard::all();

        return view('admin.pages.dashboard.index-dashboard', ['dashboard'=>$dashboard]);
    }
}
