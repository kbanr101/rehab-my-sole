<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index()
    {
        // dd("work");

        $contacts = Contacts::paginate(3);
        return view('admin.contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:contacts,email|max:255',
            ]);


            Contacts::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Contact created successfully.',
                // 'data' => $contact,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create contact.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
