@extends('include.master')
@section('content')
    <div class="loginPages pt-4">
        <div class="formContainer pt-5 mt-4">
            <div class="formInner">
                <div class="loginPagesTitle">
                    <h3>Create an account</h3>
                    <p>We’re cooking up something exciting! Be the first to know when we go live—subscribe below!</p>
                </div>
                @if (session('error'))
                    <div id="responseMessage" class="mb-4 text-red-600 text-sm text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="contactForm" class="contactForm" method="post" action="{{ route('submit.password') }}">
                    @csrf
                    <div class="form-group">
                        <label for="password">Create a password</label>
                        <div class="showPassword">
                            <input type="password" id="password" placeholder="Enter your password" name="password">
                            <span id="showPass" onclick="togglePassword(this)"><i class="fa-solid fa-eye"></i></span>
                            @error('password')
                                <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="form-group">
                        <label for="password">Re-enter password</label>
                        <div class="showPassword">
                            <input type="password" id="password" placeholder="Enter your password"
                                name="password_confirmation">
                            <span id="showPass" onclick="togglePassword(this)"><i class="fa-solid fa-eye"></i></span>
                            @error('password_confirmation')
                                <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @csrf
                    <div class="form-group">
                        <button type="submit">Change Password</button>
                    </div>
                    <p class="extraLink text-center">Have an account? <a href="{{ route('login') }}">Login</a></p>
                    <div class="otherlink"><span>Or</span></div>
                    <div class="loginOption text-center pb-5">
                        <label>Continue to log in with</label>
                        <ul>
                            <li><a href="{{ route('google.login') }}"><i class="fa-brands fa-google"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-apple"></i></a></li>
                            <li><a href="{{ route('facebook.login') }}"><i class="fa-brands fa-square-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
