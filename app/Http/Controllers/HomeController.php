<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Likes;

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
    public function blogList(Request $request)
    {
        // $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        $ipAddress = $request->ip();
        $posts = Post::withCount(['likes as likes_count' => function ($query) use ($ipAddress) {
            $query->where('ip_address', $ipAddress);
        }])
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        //->get();
        return view('blogListPage', compact('posts'));
    }


    public function blogDetails(Request $request,  $slug)
    {
        // dd($request->ip());
        $ipAddress = $request->ip();
        $post =
            $post = Post::withCount([
                'likes',
                'likes as likes_count' => function ($query) use ($ipAddress) {
                    $query->where('ip_address', $ipAddress);
                }
            ])
            ->where('slug', $slug)
            ->firstOrFail();
        $recentPost = Post::withCount(['likes as likes_count' => function ($query) use ($ipAddress) {
            $query->where('ip_address', $ipAddress);
        }])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        // dd($recentPost);

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

    public function like(Request $request, $id)
    {
        $ip_address = $request->ip();

        $like = Likes::where('ip_address', $ip_address)
            ->where('post_id', $id)
            ->first();

        if ($like) {
            return response()->json(['message' => 'You have already liked this.'], 200);
        }

        Likes::create([
            'ip_address' => $ip_address,
            'post_id' => $id,
        ]);

        $post = Post::withCount('likes')->where('id', $id)->firstOrFail();
        $likes_count = $post->likes_count;

        return response()->json(['success' => true, 'liked' => true, 'message' => 'Liked successfully!', 'likes_count' => $likes_count], 201);
    }
}
