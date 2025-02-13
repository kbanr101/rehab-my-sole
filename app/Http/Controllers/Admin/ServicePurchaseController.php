<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePurchase;
use App\Models\ServiceOrder;

class ServicePurchaseController extends Controller
{
    public function index()
    {
        $service_list = ServicePurchase::with('user')->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.servicepurchase.index', compact('service_list'));
    }

    public function show($id)
    {

        $details = ServicePurchase::with('user')->where('id', $id)->first();
        return view('admin.servicepurchase.details', compact('details'));
    }

    public function edit($id)
    {
        return view('admin.servicepurchase.create', compact('details'));
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name||max:255',
            'slug' => 'required|string|unique:categories,slug|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        ServiceOrder::create($validated);
    }
}
