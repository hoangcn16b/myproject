<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function home(){
        return view('backend.pages.dashboard.index', []);
    }

    public function login(){
        return view('backend.user.login', []);
    }
}
