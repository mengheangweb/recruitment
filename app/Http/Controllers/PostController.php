<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $listing = Post::orderBy('id', 'desc')->paginate(12);

        return view('post.listing', compact('listing'));
    }

    public function post()
    {
        return view('post.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required|min:3|max:100',
            'hiring' => 'required|numeric',
            'salary' => 'required',
            'description' => 'required',
            'requirment' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'hiring' => request('hiring'),
            'salary' => request('salary'),
            'description' => request('description'),
            'requirment' => request('requirment'),
        ]);

        return redirect()->to('/listing/post');
    }
}
