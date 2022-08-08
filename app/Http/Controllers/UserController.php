<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Company;
use Auth;
use App\Mail\Welcome;
use App\Mail\MD_Welcome;
use Mail;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|min:3|max:50',
            'profile' => 'required',
            'logo' => 'image'
        ],[
            'name.required' => __('auth.register_name_msg')
        ], [
            'name' => __('auth.name')
        ]);

        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

        if($request->logo){
            $logo = $request->logo->store('logo');
        }else{
            $logo = null;
        }

        $company = [
                    'name' => $request->company_name,
                    'logo' => $logo,
                    'profile' => $request->profile,
                ];

        $user->company()->create($company);

        Auth::login($user);

        Mail::to($user->email)->later(now()->addMinutes(1), new MD_Welcome());

        return redirect()->back()->with('message', 'You have successfully registered.');
    }

    public function formLogin()
    {
        return view('user.login');
    }

    public function doLogin(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect('/home');
        }

        return redirect()->back()->withError('Incorrect username or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
