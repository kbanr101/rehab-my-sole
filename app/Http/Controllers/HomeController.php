<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Likes;
use App\Models\Category;
use Jorenvh\Share\ShareFacade as Share;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('posts'));
    }
    public function comingSoon()
    {
        $transparentClass = "transparentClass comming-soon";
        return view('comingSoonPage', compact('transparentClass'));
    }
    public function contactus()
    {
        return view('contactus');
    }
    public function personalize()
    {
        return view('personalize');
    }
    public function blogList(Request $request)
    {
        $categories = Category::where('status', 'active')->get();
        return view('blogListPage', compact('categories'));
    }
    public function ajaxBlog(Request $request)
    {
        $ipAddress = $request->ip();
        $category_id = $request->input('category');
        $search = $request->input('search');

        $postsQuery = Post::with('category') // Include category relationship
            ->withCount([
                'likes as likes_count' => function ($query) use ($ipAddress) {
                    $query->where('ip_address', $ipAddress);
                }
            ])
            ->orderBy('created_at', 'desc');
        if (!empty($category_id)) {
            $postsQuery->where('category_id', $category_id);
        }

        if (!empty($search)) {
            $postsQuery->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%") // Search in post title
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%$search%"); // Search in category name
                    });
            });
        }
        $posts = $postsQuery->paginate(9);
        return view('postAjax', compact('posts'));
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

        $shareButtons = Share::page(
            url("/blogDetailPage/$post->slug"), // Dynamic blog post URL
            $post->title // Blog post title as description
        )
            ->facebook()
            ->twitter()
            //->linkedin();
            ->telegram();
        //->whatsapp()
        // ->instagram();

        return view('blogDetailPage', compact('post', 'recentPost', 'nextPostSlug', 'shareButtons'));
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
