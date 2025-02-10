<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePurchase;

class ServicePurchaseController extends Controller
{
    public function index()
    {
        $service_list = ServicePurchase::with('user')->orderBy('created_at', 'desc')
            ->paginate(10);
        // dd($service_list);
        return view('admin.servicepurchase.index', compact('service_list'));
    }
}
