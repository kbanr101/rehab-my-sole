@extends('include.master')
@section('content')
<div class="loginPages pt-4">
    <div class="formContainer pt-5 mt-4">
        <div class="formInner">
            <div class="loginPagesTitle">
                <h3>OTP Verification</h3>
                <p>An email containing an OTP was sent to your email. Input the code below</p>
            </div>
            <div id="responseMessage"></div>
            <form id="contactForm">
                <div class="form-group">
                    <label for="otp">Enter OTP</label>
                    <input type="text" id="otp" placeholder="Enter OTP" name="otp">
                </div>
                <div class="form-group">
                    <button type="submit">Verify</button>
                </div>
                <p class="extraLink text-center">Don’t have an email? <a href="{{ route('registerPages') }}">Resend OTP</a></p>
                <div class="loginOption text-center pb-5"></div>
            </form>
        </div>
    </div>
</div>
@endsection
