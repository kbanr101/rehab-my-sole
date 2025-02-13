<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ServicePurchase;

class ServiceBookController extends Controller
{
    public function index()
    {
        return view('personalize.index');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([

                'service' => 'required',
                'user_id' => 'required|exists:users,id', // Ensure user exists
            ]);

            $uploadedImages = [];

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('service'), $imageName);
                    $uploadedImages[] = $imageName;
                }
            }
            // Store Data in Database
            ServicePurchase::create([
                'user_id' => $request->user_id,
                'service_name' => $request->service,
                'pic_date' => $request->date,
                'address' => $request->address,
                'city' => $request->city,
                'number_shoes' => $request->number_shoes,
                'image' => count($uploadedImages) > 0 ? implode('|', $uploadedImages) : null,
                'comment' => $request->comments,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your interest in ' . $request->service_name . ' services. We will contact you shortly!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to process your request.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
