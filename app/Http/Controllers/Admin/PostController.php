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
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $validated['user_id'] = auth()->id(); // Set the logged-in user's ID

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
