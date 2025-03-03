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

        $contacts = Contacts::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);

            $message = $request->message ? $request->message : '';
            Contacts::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'description' => $message,
            ]);


            $emailReceiver = env('EMAIL_RECIVER');

            Mail::to($emailReceiver)->send(new ContactCreated($validatedData['name'], $validatedData['email']));

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
    public function destroy($id)
    {
        try {
            $contact = Contacts::find($id);

            if (!$contact) {
                return redirect()->back()->with('error', 'Contact not found.');
            }

            $contact->delete();

            return redirect()->back()->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while deleting the post. Please try again.');
        }
    }
}
