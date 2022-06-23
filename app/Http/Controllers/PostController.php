<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $listing = Post::orderBy('id', 'desc')->paginate(12);

        return view('post.listing', compact('listing'));
    }

    public function post()
    {
        $tags = Tag::all();

        return view('post.create', compact('tags'));
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

        $auth = Auth::user();

        $post = Post::create([
                    'title' => request('title'),
                    'hiring' => request('hiring'),
                    'salary' => request('salary'),
                    'description' => request('description'),
                    'requirment' => request('requirment'),
                    'user_id' => $auth->id,
                    'company_id' => $auth->company->id
                ]);

        $post->tag()->attach(request()->tag);

        return redirect()->to('/listing/post')->withMessage('Ads was successfully publised.');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('post.detail', compact('post'));
    }
}
