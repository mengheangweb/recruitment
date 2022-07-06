<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $query = Post::query();

        if($request->has('keyword'))
        {
            $query->where('title', 'like', '%'.$keyword.'%');
        }

        $listing = $query->orderBy('id', 'desc')->paginate(12);

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

    public function myListing()
    {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(10);

        $deleted_post = Post::onlyTrashed()->get();

        return view('post.mypost', compact('posts', 'deleted_post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();

        $post_tags = $post->tag->pluck('id')->toArray();

        return view('post.edit', compact('post', 'tags', 'post_tags'));
    }

    public function update($id)
    {
        $post = Post::find($id);

        if(!$post){
            return redirect()->back()->withError('Post not found');
        }
        
        request()->validate([
            'title' => 'required|min:3|max:100',
            'hiring' => 'required|numeric',
            'salary' => 'required',
            'description' => 'required',
            'requirment' => 'required',
        ]);

        $auth = Auth::user();

        Post::where('id', $id)->update([
                    'title' => request('title'),
                    'hiring' => request('hiring'),
                    'salary' => request('salary'),
                    'description' => request('description'),
                    'requirment' => request('requirment'),
                    'user_id' => $auth->id,
                    'company_id' => $auth->company->id
                ]);

        $post->tag()->sync(request()->tag);

        return redirect('/my-listing')->withMessage('Ads was successfully updated.');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if(!$post){
            return redirect()->back()->withError('Post not found');
        }

        //$post_tags = $post->tag()->detach();

        $post->delete();

        return redirect('/my-listing')->withMessage('Ads was successfully deleted.');
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->whereId($id)->first();

        if(!$post){
            return redirect()->back()->withError('Post not found');
        }

        //$post_tags = $post->tag()->detach();

        $post->restore();

        return redirect('/my-listing')->withMessage('Ads was successfully restored.');
    }
}
