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

        $details = ServicePurchase::with(['user', 'order'])->find($id);


        //dd($details);
        return view('admin.servicepurchase.details', compact('details'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'delivery_amount' => 'required|numeric',
                'discount_amount' => 'required|numeric',
                'charge_amount' => 'required|numeric',
                'user_id' => 'required|exists:users,id',
                'service_purchase_id' => 'required|exists:service_purchases,id',
            ]);

            $total_amount = $request->charge_amount + $request->delivery_amount - $request->discount_amount;

            ServiceOrder::create([
                'user_id' => $request->user_id,
                'service_purchase_id' => $request->service_purchase_id,
                'charge_amount' => $request->charge_amount,
                'discount' => $request->discount_amount,
                'delivery_amount' => $request->delivery_amount,
                'total_amount' => $total_amount,
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Charges Added Successfully.');
        } catch (\Exception $e) {


            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to add charges. Please try again.');
        }
    }
}
