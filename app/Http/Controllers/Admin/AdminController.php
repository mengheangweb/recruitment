<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function formLogin()
    {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::guard('admin')->attempt($credential)){
            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }

        return redirect()->back()->withError('Incorrect username or password');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

}
