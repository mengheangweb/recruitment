<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Company;

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
        ]);

        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

        $logo = $request->logo->store('public/logo');

        $company = [
                    'name' => $request->name,
                    'logo' => $logo,
                    'profile' => $request->profile,
                ];

        $user->company()->create($company);

        return redirect()->back();
    }
}
