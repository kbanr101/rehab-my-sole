<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Str;

class FacebookLoginController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::where('email', $facebookUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $facebookUser->getName(),
                    'email' => $facebookUser->getEmail(),
                    'facebook_id' => $facebookUser->getId(),

                    'password' => bcrypt(Str::random(16)), // Random password
                ]);
            }

            // Generate API token
            $token = $user->createToken('auth_token')->plainTextToken;

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
