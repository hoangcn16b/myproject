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
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     'level' => '1',
        //     'password' => bcrypt('123456'),
        // ], [
        //     'name' => 'manager',
        //     'email' => 'manager@gmail.com',
        //     'level' => '2',
        //     'password' => bcrypt('123456'),
        // ], [
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'level' => '3',
        //     'password' => bcrypt('123456'),
        // ]);
        return view('backend.user.login', []);
    }

    public function postLogin(Request $request)
    {
        // Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home/backend');
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
