<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //dashboard
    public function dashboard(Request $request)
    {
        return view('owner/dashboard');
    }

    //account
    public function account(Request $request)
    {
        return view('owner/account');
    }

    //feedback
    public function feedback(Request $request)
    {
        return view('owner/feedback');
    }
}
