<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController as MainController;

class HomeController extends MainController
{

    public function home(){
        return view('admin.pages.dashboard.index', []);
    }

    public function login(){
        return view('admin.user.login', []);
    }
}
