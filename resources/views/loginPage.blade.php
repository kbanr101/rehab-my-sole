@extends('include.master')
@section('content')
    <div class="loginPages pt-4">
        <div class="formContainer pt-5 mt-4">
            <div class="formInner">
                <div class="loginPagesTitle">
                    <h3>Log in</h3>
                    <p>We’re cooking up something exciting! Be the first to know when we go live—subscribe below!</p>
                </div>
                <div id="responseMessage"></div>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="email">Enter your Email</label>
                        <input type="text" id="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Enter your password</label>
                        <div class="showPassword">
                            <input type="password" id="password" placeholder="Enter your password" name="password">
                            <span id="showPass"><i class="fa-solid fa-eye"></i></span>
                        </div>
                    </div>
                    @csrf
                    <div class="form-group">
                        <button type="submit">Log in</button>
                    </div>
                    <p class="extraLink text-center">Don’t have an account? <a href="{{ route('registerPages') }}">Create an
                            account</a></p>
                    <p class="extraLink text-center"><a href="{{ route('forgot_password') }}">Forgot Password</a></p>
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
