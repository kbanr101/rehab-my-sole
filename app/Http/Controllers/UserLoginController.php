<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\AuthController;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class UserLoginController extends Controller
{
    public function index()
    {

        // return view('login.login');

        $transparentClass = "transparentClass comming-soon";
        return view('login.login', compact('transparentClass'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        $AuthController = new AuthController();
        $response = $AuthController->login($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {

            session(['token' => $data['token'], 'user' => $data['user']]);
            Alert::success('Login Successful', 'Welcome Back!');
            //dd();
            return redirect()->route('aboutusPage')->with('success', 'Login successful');
        } else {
            Alert::error('Login Failed', 'Invalid Credentials!');

            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
