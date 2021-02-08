<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $posts = $category->posts()->simplePaginate(6);
        return view('posts.index', compact('posts', 'category'));
    }
}
