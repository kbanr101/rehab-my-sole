<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    //
    public function sendOtp(Request $request)
    {
        try {
            // Validate the email
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            // Generate OTP
            $otp = rand(1000, 9999);

            // Find the user
            $user = User::where('email', $request->email)->first();
            $user->update(['otp' => $otp]);

            // Send OTP to email
            Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Password Reset OTP');
            });

            return response()->json([
                'status' => true,
                'message' => 'OTP has been sent to your email.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'otp' => 'required|numeric',
            ]);

            // Find the user
            $user = User::where('email', $request->email)->first();

            if ($user->otp !== $request->otp) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP.',
                ], 400);
            }

            // Mark OTP as verified (optional: set expiration logic)
            $user->update(['otp' => null]);

            return response()->json([
                'status' => true,
                'message' => 'OTP verified successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Find the user
            $user = User::where('email', $request->email)->first();

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Password has been reset successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }
}
