<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // calling model here
        $listing = Post::limit(4)->orderBy('id','desc')->get();

        return view('home', compact('listing'));
    }
}
