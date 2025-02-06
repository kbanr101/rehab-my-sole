@extends('include.master')
@section('content')
    <div class="loginPages pt-4">
        <div class="formContainer pt-5 mt-4">
            <div class="formInner">
                <div class="loginPagesTitle">
                    <h3>Create an account</h3>
                    <p>We’re cooking up something exciting! Be the first to know when we go live—subscribe below!</p>
                </div>
                <div id="responseMessage"></div>
                <form id="contactForm" method="post" action="{{ route('register.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter your full name</label>
                        <input type="text" id="name" placeholder="John" name="name">
                        @error('name')
                            <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Enter your Email</label>
                        <input type="text" id="email" placeholder="example@gmail.com" name="email">
                        @error('email')
                            <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="role" value="Customer">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" placeholder="+1 123 4567 8901" name="phone_number">
                        @error('phone_number')
                            <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Create a password</label>
                        <div class="showPassword">
                            <input type="password" id="password" placeholder="Enter your password" name="password">
                            <span id="showPass"><i class="fa-solid fa-eye"></i></span>
                            @error('password')
                                <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Re-enter password</label>
                        <div class="showPassword">
                            <input type="password" id="password" placeholder="Enter your password"
                                name="password_confirmation">
                            <span id="showPass"><i class="fa-solid fa-eye"></i></span>
                            @error('password_confirmation')
                                <span style="color: red;" class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @csrf
                    <div class="form-group">
                        <button type="submit">Create an account</button>
                    </div>
                    <p class="extraLink text-center">Have an account? <a href="{{ route('login') }}">Login</a></p>
                    <div class="otherlink"><span>Or</span></div>
                    <div class="loginOption text-center pb-5">
                        <label>Continue to log in with</label>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-google"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-apple"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
