<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts')); // Points to resources/views/admin/dashboard.blade.php
    }

    public function create()
    {
        return view('admin.post.create'); // Points to resources/views/admin/dashboard.blade.php
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('blogs'), $imageName);
            $validated['image'] = $imageName;
        }

        $validated['user_id'] = auth()->id(); // Set the logged-in user's ID

        Post::create($validated);

        return redirect()->route('post_list')->with('success', 'Post created successfully!');
    }
}
