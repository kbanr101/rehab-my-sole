<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::paginate(3);
        return view('index', compact('posts'));
    }
    public function comingSoon()
    {
        $transparentClass = "transparentClass comming-soon";
        return view('comingSoonPage', compact('transparentClass'));
    }
    public function blogList()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('blogListPage', compact('posts'));
    }
    // public function blogDetailPage()
    // {

    //     return view('blogDetailPage');
    // }
    public function blogDetails($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('blogDetailPage', compact('post'));
    }
}
