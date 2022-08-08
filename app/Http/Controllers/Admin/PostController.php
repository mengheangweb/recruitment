<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Notifications\PostResponse;
use App\Events\PostStatus;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.post.listing', compact('posts'));
    }

    public function response($id, $status)
    {

        $post = Post::whereId($id)->first();
        
        $post->update(['status' => $status]);

       $user = $post->user;

      // $user->notify(New PostResponse($post));

        PostStatus::dispatch($post);

        return redirect()->back();
    }
}


