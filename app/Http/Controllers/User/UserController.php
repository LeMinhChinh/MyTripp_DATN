<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Homepage

    public function homepage(){
        return view('user/home');
    }

    // Login

    public function login(Request $request)
    {
        return view('user/login');
    }

    // Register

    public function register(Request $request)
    {
        return view('user/register');
    }

    // Room

    public function room(Request $request){
        return view('user/room');
    }

    public function searchroom(Request $request){
        return view('user/search-room');
    }


    // Resting place

    public function restingplace(Request $request){
        return view('user/restingplace');
    }

    public function searchrestingplace(Request $request){
        return view('user/search-restingplace');
    }

    // Personal

    public function personal(Request $request){
        return view('user/personal');
    }
}
