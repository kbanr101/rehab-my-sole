<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category') // Eager load the category relationship
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // dd($posts);
        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        $category = Category::select('name', 'id')->where('status', 'active')->get();
        return view('admin.post.create', compact('category'));
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
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            // $validated['image'] = $request->file('image')->storeAs('blogs', $imageName, 'public');

            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('blogs'), $imageName);

            // Store the relative path in the database
            $validated['image'] = 'blogs/' . $imageName;
        }

        $validated['user_id'] = auth()->id(); // Set the logged-in user's ID

        Post::create($validated);

        return redirect()->route('post.list')->with('success', 'Post created successfully!');
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
        $category = Category::select('name', 'id')->where('status', 'active')->get();
        return view('admin.post.edit', compact('post', 'category'));
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
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($request->id);

        $post->title = $validated['title'];
        $post->slug = $validated['slug'];
        $post->description = $validated['description'];
        $post->seo_title = $validated['seo_title'];
        $post->seo_description = $validated['seo_description'];
        $post->short_description = $validated['short_description'];
        $post->seo_keywords = $validated['seo_keywords'];
        $post->category_id = $validated['category_id'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('blogs'), $imageName);

            // Store the relative path in the database
            $post->image = 'blogs/' . $imageName;
        }

        $post->save();

        return redirect()->route('post.list')->with('success', 'Post updated successfully.');
    }
}
