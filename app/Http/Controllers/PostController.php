<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest()->simplePaginate(3);
        return view('posts.index', ['posts' => $post]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', ['post' => New Post()]);
    }

    public function store(PostRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = \Str::slug($request->title);
        Post::create($attr);

        session()->flash('success', 'The post was created');
        // return back();
        return redirect('posts');
    }

    public function edit(Post $post){
        return view('posts.edit',compact('post'));
        
    }

    public function update(PostRequest $request, Post $post){
        $attr = $request->all();
        $post->update($attr);
        session()->flash('success', 'The post was created');
        // return back();
        return redirect('posts');
    }

    public function destroy(Post $post){
        $post->delete();
        session()->flash('success', 'The post has destroyed');
        return redirect('posts');
    }
}
