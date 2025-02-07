<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        //return Socialite::driver('google')->redirect();
        config([
            'services.google.redirect' => $request->is('api/*')
                ? config('services.google.api_redirect')
                : config('services.google.web_redirect')
        ]);

        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user(); // Use stateless mode

            // Check if the user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            // If the user doesn't exist, create a new user
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'profile_picture' => $googleUser->getAvatar(),
                    'password' => bcrypt(Str::random(16)),
                ]);
            }

            // Generate API token
            $token = $user->createToken('Google Login')->plainTextToken;

            if ($user) {
                session(['token' => $token, 'user' => $user]);
                Alert::success('Login Successful', 'Welcome Back!');

                return redirect()->route('aboutusPage')->with('success', 'Login successful');
            } else {
                Alert::error('Login Failed', 'Invalid Credentials!');
                return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Facebook login failed!');
        }
    }
}
