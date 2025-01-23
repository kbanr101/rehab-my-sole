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


    public function blogDetails($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();
        $recentPost = Post::orderBy('created_at', 'desc')->limit(3)->get();

        $nextPost = Post::select('slug')->where('id', '>', $post->id)->orderBy('id', 'asc')->first();

        if ($nextPost) {
            $nextPostSlug = $nextPost->slug;
        } else {
            $randomPost  = Post::select('slug')->inRandomOrder()->first();
            $nextPostSlug =  $randomPost->slug;
        }

        return view('blogDetailPage', compact('post', 'recentPost', 'nextPostSlug'));
    }
    public function aboutus()
    {
        return view('aboutusPage');
    }
}
