<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest()->simplePaginate(4);
        return view('posts.index', ['posts' => $post]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();
        // return \redirect()->to('posts');
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body
        // ]);

        $attr = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        $attr['slug'] = \Str::slug($request->title);
        Post::create($attr);
        return back();
    }
}
