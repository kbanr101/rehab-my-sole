<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'phone_number' => 'required|string|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',
                'role' => 'required|string|in:Provider,Customer,Admin',
            ]);

            $otp = rand(1000, 9999);

            // Create user with phone_number
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'otp' => $otp,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
            ]);

            // Send OTP via email (or SMS)
            Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Account Verification OTP');
            });

            return response()->json([
                'status' => true,
                'email' => $request->email,
                'message' => 'Signup successful. Please verify your account with the OTP sent to your email.',
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation errors occurred.',
                'errors' => $e->errors(), // Send detailed validation errors
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }


    // Step 2: Verify OTP and activate account
    public function verifyOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|string|size:4',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            if ($user->otp !== $request->otp) {
                return response()->json(['message' => 'Invalid OTP'], 400);
            }


            $user->update([
                'is_verified' => true,
                'otp' => null,
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Account verified successfully.',
                'token' => $token,
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }


    public function forgotOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|string|size:4',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found', 'status' => false,], 404);
            }

            if ($user->otp !== $request->otp) {
                return response()->json(['message' => 'Invalid OTP', 'status' => false,], 400);
            }


            $user->update([
                'is_verified' => true,
                'otp' => null,
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Account verified successfully.',
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }



    public function resendOtp(Request $request)
    {
        try {
            // Validate the email input
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found.',
                ], 404);
            }

            $otp = rand(1000, 9999);

            $user->update(['otp' => $otp]);

            Mail::raw("Your new OTP is: $otp", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Resend OTP');
            });

            return response()->json(
                [
                    'status' => true,
                    'message' => 'OTP has been resent successfully.',
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

    public function testing()
    {
        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
        ], 200);
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
                'role' => 'required'
            ]);

            $user = User::where('email', $request->email)->where('role', $request->role)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid email or password.',
                ], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'token' => $token,
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }
}
