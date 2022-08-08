<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Jobs\BackupDB;

class HomeController extends Controller
{
    public function index()
    {
        // calling model here
        $listing = Post::limit(4)->orderBy('id','desc')->get();

        BackupDB::dispatch()->delay(now()->addMinutes(1));

        return view('home', compact('listing'));
    }

    public function backup()
    {
        BackupDB::dispatch()->delay(now()->addMinutes(1));

        return response('Backup job placed in background');
    }
}
