<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // if(auth()->user()>hasRole('admin'))
        // {
            return view('admin.pages.dashboard.index-dashboard');
        // }
        //     return view('admin.pages.dashboard.index-dashboard2');
    }
}
