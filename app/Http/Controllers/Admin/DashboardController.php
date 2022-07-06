<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $count_users = User::count();
        $count_post = Post::count();

        return view('admin.dashboard.index', compact('count_users', 'count_post'));
    }
}
