<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $name = "Rizki";
        return view('home', compact('name'));
    }
}
