<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin dashboard
    public function dashboard()
    {
        // Implement your admin dashboard logic here
        return view('admin.dashboard');
    }
}
