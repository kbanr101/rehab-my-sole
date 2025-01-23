<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('blogs', $imageName, 'public');
        }

        $validated['user_id'] = auth()->id(); // Set the logged-in user's ID

        Post::create($validated);

        return redirect()->route('post_list')->with('success', 'Post created successfully!');
    }


    public function destroy($id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return redirect()->back()->with('error', 'Post not found.');
            }

            $post->delete();

            return redirect()->back()->with('success', 'Post deleted successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while deleting the post. Please try again.');
        }
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $request->id,
            'short_description' => 'required|string',
            'description' => 'required',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'seo_keywords' => 'nullable|string',

        ]);

        $post = Post::findOrFail($request->id);

        $post->title = $validated['title'];
        $post->slug = $validated['slug'];
        $post->description = $validated['description'];
        $post->seo_title = $validated['seo_title'];
        $post->seo_description = $validated['seo_description'];
        $post->short_description = $validated['short_description'];
        $post->seo_keywords = $validated['seo_keywords'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $post->image = $request->file('image')->storeAs('blogs', $imageName, 'public');
        }

        $post->save();

        return redirect()->route('post_list')->with('success', 'Post updated successfully.');
    }
}
