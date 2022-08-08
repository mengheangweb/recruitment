<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function listing(Request $request)
    {
        $keyword = $request->keyword;

        $query = Post::query();

        if($request->has('keyword'))
        {
            $query->where('title', 'like', '%'.$keyword.'%');
        }

        $listing = $query->orderBy('id', 'desc')->paginate(12);

        return response()->json($listing);
    }

    public function myListing()
    {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(10);

        $deleted_post = Post::onlyTrashed()->get();

        return response()->json(compact('posts', 'deleted_post'));
    }
}
