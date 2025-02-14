<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceList;

class ServiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_list = ServiceList::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.servicelist.index', compact('service_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicelist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'service_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'slug' => 'required|string|max:255|unique:service_lists',
        ]);

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('service'), $imageName);

            $image = 'service/' . $imageName;
        }

        ServiceList::create([
            'service_name' => $request->service_name,
            'image' => $image,
            'description' => $request->description,
            'slug' => $request->slug,
        ]);
        return redirect()->route('servicelist.index')->with('success', 'Slider added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = ServiceList::where('id', $id)->first();
        return view('admin.servicelist.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceList $servicelist)
    {

        // dd($servicelist);
        // Validate input
        $validated = $request->validate([
            'service_name' => 'required|string|unique:categories,name,' . $servicelist->id . '||max:255',
            'slug' => 'required|string|unique:service_lists,slug,' . $servicelist->id . '|max:255',
            'status' => 'required|in:active,inactive',
            'description' => 'required',

        ]);

        // Update the category
        $servicelist->update($validated);

        return redirect()->route('servicelist.index')->with('success', 'Services updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $service = ServiceList::find($id);

            if (!$service) {
                return redirect()->back()->with('error', 'Service not found.');
            }

            $service->delete();

            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while deleting the post. Please try again.');
        }
    }
}
