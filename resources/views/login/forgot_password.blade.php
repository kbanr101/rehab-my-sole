@extends('include.master')
@section('content')
    <div class="loginPages pt-4">
        <div class="formContainer pt-5 mt-4">
            <div class="formInner">
                <div class="loginPagesTitle">
                    <h3>Forgot Password</h3>
                    <p>An OTP has been sent to your registered email ID. Please enter it below to proceed.</p>
                </div>
                <div id="responseMessage"></div>
                @if (session('error'))
                    <div class="mb-4 text-red-600 text-sm text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="contactForm" action="{{ route('submit.forgot_password') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter your Email</label>
                        <input type="text" id="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <button type="submit">Send</button>
                    </div>
                    <p class="extraLink text-center">Don’t have an account? <a href="{{ route('register') }}">Change
                            email</a></p>
                    <div class="loginOption text-center pb-5"></div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
