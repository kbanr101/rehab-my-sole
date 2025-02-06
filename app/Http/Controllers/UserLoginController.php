<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgotPasswordController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserLoginController extends Controller
{
    public function index()
    {


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

            return redirect()->route('aboutusPage')->with('success', 'Login successful');
        } else {
            Alert::error('Login Failed', 'Invalid Credentials!');

            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function register()
    {
        $transparentClass = "transparentClass comming-soon";
        return view('login.register', compact('transparentClass'));
    }

    public function registerCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'role' => 'required|string|in:Provider,Customer,Admin',

        ]);

        $AuthController = new AuthController();
        $response = $AuthController->signup($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {

            Alert::success('OTP Sent Successfully. Please Verify.');
            session(['email' => $data['email']]);
            return redirect()->route('verify_otp')->with('success', 'OTP Sent Successfully. Please Verify.');
        } else {
            Alert::error('Sign Up Failed', 'Invalid Credentials Details!');

            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function resendOtp(Request $request)
    {

        $AuthController = new AuthController();
        $response = $AuthController->resendOtp($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {

            Alert::success('OTP Sent Successfully. Please Verify.');

            return redirect()->route('verify_otp')->with('success', 'OTP  Resend Sent Successfully. Please Verify.');
        } else {
            Alert::error('Sign Up Failed', 'Invalid Credentials Details!');

            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function  otpView()
    {
        $email = session('email');
        $transparentClass = "transparentClass comming-soon";

        return view('login.otp_verify', compact('transparentClass', 'email'));
    }

    public function VerifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|size:4',
        ]);

        $AuthController = new AuthController();
        $response = $AuthController->verifyOtp($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {

            session(['token' => $data['token'], 'user' => $data['user']]);
            Alert::success('Login Successful', 'Welcome Rehab My Sole');
            return redirect()->route('aboutusPage')->with('success', 'Login successful');
        } else {
            Alert::error('Sign Up Failed', 'Invalid Credentials Details!');

            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function forgotPassword()
    {
        $transparentClass = "transparentClass comming-soon";
        return view('login.forgot_password', compact('transparentClass'));
    }

    public function forgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $ForgotPasswordController = new ForgotPasswordController();
        $response = $ForgotPasswordController->sendOtp($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {


            Alert::success('Forgot Password Otp Sent');
            session(['email' => $request->email]);
            return redirect()->route('forgot_otp');
        } else {
            Alert::error('Invalid Email', 'Invalid Credentials Details!');

            return redirect()->back()->with('error', 'Invalid Email. Please try again.');
        }
    }

    public function forgotOtp()
    {
        $email = session('email');
        $transparentClass = "transparentClass comming-soon";
        return view('login.forgot_otp', compact('transparentClass', 'email'));
    }

    public function forgotOtpSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|size:4',
        ]);

        $AuthController = new AuthController();
        $response = $AuthController->forgotOtp($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {
            Alert::success('Forgot Password Otp Sent');
            return redirect()->route('change_password');
        } else {
            Alert::error('Invalid OTP', 'Please try again!');

            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }
    }

    public function changePassword()
    {
        $email = session('email');
        $transparentClass = "transparentClass comming-soon";
        return view('login.change_password', compact('transparentClass', 'email'));
    }


    public function changePasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $ForgotPasswordController = new ForgotPasswordController();
        $response = $ForgotPasswordController->resetPassword($request);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {


            Alert::success('Password has been reset successfully.');
            session(['email' => $request->email]);
            return redirect()->route('login');
        } else {
            Alert::error('Password Change Failed', 'Invalid Credentials Details!');

            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
