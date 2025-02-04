<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('slider'), $imageName);

            $image = 'slider/' . $imageName;
        }

        Slider::create([
            'title' => $request->title,
            'image' => $image,
            'description' => $request->description,
        ]);
        return redirect()->route('slider_list')->with('success', 'Slider added successfully!');
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);

            if (!$slider) {
                return redirect()->back()->with('error', 'Slider not found.');
            }

            $slider->delete();

            return redirect()->back()->with('success', 'Slider deleted successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while deleting the post. Please try again.');
        }
    }

    public function edit($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);
        $id = $request->id;
        $slider = Slider::findOrFail($id);

        $slider->title = $request->title;
        $slider->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('slider'), $imageName);

            $slider->image = 'slider/' . $imageName;
        }

        $slider->save();

        return redirect()->route('slider_list')->with('success', 'Slider updated successfully.');
    }
}
