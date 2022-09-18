<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'hoangalt0098@gmail.com',
        //     'level' => '1',
        //     'password' => bcrypt('123456'),
        //     'fullname' => 'hoang 0098',
        //     'address' => '101, p26',
        // ]);
        return view('auth.login', []);
    }

    public function postLogin(Request $request)
    {
        // Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home/admin');
        } else {
            return redirect()->route('auth/login')->with('error-login', 'Đăng nhập thất bại!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth/login')->with('message-logout', 'Đã đăng xuất');
    }
}
