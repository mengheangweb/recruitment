<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function switch($code)
    {
        session()->put('locale', $code);

        return redirect()->back();
    }
}
