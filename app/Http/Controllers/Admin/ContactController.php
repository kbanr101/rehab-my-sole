<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Mail\ContactCreated;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        // dd("work");

        $contacts = Contacts::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);


            Contacts::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]);

            $email = "vineetk@mtriplet.com";

            Mail::to($email)->send(new ContactCreated($validatedData['name'], $validatedData['email']));

            return response()->json([
                'success' => true,
                'message' => 'Thank you,' . $validatedData['name'] . '! Your message has been received.',
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
