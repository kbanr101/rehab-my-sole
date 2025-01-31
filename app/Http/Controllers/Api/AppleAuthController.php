<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AppleAuthController extends Controller
{
    public function redirectToApple()
    {
        return Socialite::driver('apple')->redirect();
    }

    public function handleAppleCallback()
    {
        try {
            $appleUser = Socialite::driver('apple')->stateless()->user();

            // Extract user data
            $email = $appleUser->getEmail();
            $name = $appleUser->getName() ?? 'Apple User';

            // Find or create user
            $user = User::updateOrCreate(
                ['email' => $email],
                ['name' => $name, 'password' => bcrypt(Str::random(16))]
            );

            // Generate token
            $token = $user->createToken('AppleAuthToken')->plainTextToken;

            return response()->json(['token' => $token, 'user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Apple login failed'], 401);
        }
    }
}
