<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(Request $request)
    {
        return view('admin/dashboard');
    }

    //account
    public function account(Request $request)
    {
        return view('admin/account');
    }

    //request
    public function request(Request $request)
    {
        return view('admin/request');
    }

    //feedback
    public function feedback(Request $request)
    {
        return view('admin/feedback');
    }
}
