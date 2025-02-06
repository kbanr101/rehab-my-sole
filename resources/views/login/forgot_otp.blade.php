@extends('include.master')
@section('content')
    <div class="loginPages pt-4">
        <div class="formContainer pt-5 mt-4">
            <div class="formInner">
                <div class="loginPagesTitle">
                    <h3>OTP Verification</h3>
                    <p>An email containing an OTP was sent to your email. Input the code below</p>
                    @if (session('success'))
                        <div class="mb-4 text-red-600 text-sm text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 text-red-600 text-sm text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div id="responseMessage"></div>
                <form id="contactForm" action="{{ route('submit.forgot_otp') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="otp">Enter OTP</label>
                        <input type="text" id="otp" placeholder="Enter OTP" name="otp">
                    </div>
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="form-group">
                        <button type="submit">Verify</button>
                    </div>
                </form>
                <form id="resendOtpForm" method="POST" action="{{ route('resend_otp') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <p class="extraLink text-center">
                        Didn’t receive an email?
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Resend OTP</button>
                    </p>
                </form>
                <div class="loginOption text-center pb-5"></div>

            </div>
        </div>
    </div>
@endsection
