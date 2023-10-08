<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::all();
        return view('frontend.home.index',compact('categories','blogs'));
    }
}
