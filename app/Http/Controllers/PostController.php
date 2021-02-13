<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $post = Post::latest()->simplePaginate(6);
        return view('posts.index', ['posts' => $post]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => New Post(),
            'categories' => Category::get(),
            'tags' => Tag::get()
            ]);
    }

    public function store(PostRequest $request)
    {

        $attr = $request->all();
        $attr['slug'] = Str::slug($request->title);
        $attr['category_id'] = request('category');
        $post = Post::create($attr);

        $post->tags()->attach(request('tags'));
        session()->flash('success', 'The post was created');
        // return back();
        return redirect('posts');
    }

    public function edit(Post $post){
        return view('posts.edit',[
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get()]);
        
    }

    public function update(PostRequest $request, Post $post){
        $attr = $request->all();
        $attr['category_id'] = request('category');
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('success', 'The post was created');
        // return back();
        return redirect('posts');
    }

    public function destroy(Post $post){
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'The post has destroyed');
        return redirect('posts');
    }
}
