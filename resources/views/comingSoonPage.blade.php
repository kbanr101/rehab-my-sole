@extends('include.master')
@section('content')
    <div class="comingDoon pt-4">
        <header class="main-headers">
            <div class="custom-container">
                <div class="logo">
                    <img src="{{ asset('assets/media/RehabMySole-logo.svg') }}" alt="RehabMySolo" class="img-fluid w-100" />
                </div>
                <a href="#">About us</a>
            </div>
        </header>
        <div class="formContainer pt-5 mt-4">
            <div class="formInner">
                <div class="commingTitle">
                    <h3>Coming soon!</h3>
                    <p>We're cooking up something exciting! Be the first to know when we go live-subscribe below!</p>
                </div>
                <div id="responseMessage"></div>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Enter your full name</label>
                        <input type="text" id="name" placeholder="Enter your full name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter your email address</label>
                        <input type="text" id="email" placeholder="Enter your email address" name="email">
                    </div>
                    @csrf
                    <div class="form-group">
                        <button type="submit">Notify me</button>
                    </div>
                </form>
            </div>
        </div>
        <footer id="footer">
            <p>&copy; 2025 - Copyright. All Rights Reserved</p>
            <ul>
                <!-- <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li> -->
                <li><a href="https://www.facebook.com/rehabmysole/"><i class="fa-brands fa-square-facebook"></i></a></li>
                <!-- <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li> -->
                <li><a href="https://www.instagram.com/rehab_my_sole/"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </footer>
    </div>
    <style>
        :root {
            --font-one: "Raleway", serif;
        }

        body {
            padding: 0 0;
            margin: 0 0;
            height: 100vh;
        }

        .main-headers .custom-container {
            display: flex;
            max-width: 1240px;
            align-items: center;
            margin: auto;
            padding: 0 15px;
            box-sizing: border-box;
            width: 100%;
            justify-content: space-between
        }

        .main-headers .custom-container .logo>h3 {
            color: #fff;
            font: 700 18px/normal var(--font-one);
            margin: 0 0;
        }

        .custom-container>a {
            color: #fff;
            text-decoration: none;
            font: 500 16px/normal var(--font-one);
            outline: none;
        }

        .formContainer {
            max-width: 800px;
            margin: auto;
            padding: 0 15px;
            height: calc(350px + 140px);
        }

        .comingDoon {
            position: relative;
            background: linear-gradient(0deg, rgb(0 0 0 / 0.7), rgb(0 0 0 / 0.7)), url('./assets/media/background-landing.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            height: 100vh;
            overflow: auto;
        }

        .commingTitle h3 {
            text-align: center;
            font: 800 48px/normal var(--font-one);
            color: white;
            margin-bottom: 0.5rem;
        }

        .commingTitle p {
            text-align: center;
            margin: auto;
            max-width: 400px;
            font: 400 13px/18px var(--font-one);
            color: rgb(255 255 255 / 0.8);
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group>input::placeholder {
            color: rgb(211 211 211 / 0.5);
        }

        .form-group>input {
            outline: none;
            font: 400 14px/40px var(--font-one);
            border-radius: 4px;
            padding: 0 15px;
            background-color: transparent;
            color: rgb(255 255 255 / 0.8);
            width: 100%;
            border: 1px solid rgb(211 211 211 / 0.5);
            max-width: 500px;
            box-sizing: border-box;
        }

        .form-group>label {
            display: block;
            font: 400 13px/normal var(--font-one);
            color: rgb(255 255 255 / 0.8);
            margin-bottom: 8px;
            position: relative;
        }

        .form-group>label::after {
            content: '\f621';
            color: maroon;
            margin: 0 5px;
            font-size: 8px;
            line-height: 0;
            font-family: 'FontAwesome';
            display: inline;
            top: -8px;
            position: relative;
        }

        form#contactForm {
            max-width: 500px;
            margin: auto;
        }

        .form-group>button {
            width: 100%;
            border: 1px solid #9F4D0F;
            color: #9F4D0F;
            background-color: white;
            border-radius: 4px;
            box-shadow: none !important;
            outline: none;
            font: 500 14px/40px var(--font-one);
            display: block;
            cursor: pointer;
            transition: 0.3s all ease-in-out;
            margin-top: 2rem;
        }

        .form-group>button:hover {
            color: white;
            background-color: #9F4D0F;
        }

        footer#footer {
            position: relative;
            bottom: 0;
            text-align: center;
            margin: auto;
            width: 100%;
            color: rgb(255 255 255 / 0.8);
            font: 400 12px/normal var(--font-one);
        }

        footer#footer ul,
        footer#footer ul li {
            margin: 0 0;
            padding: 0 0;
            display: inline-block;
        }

        footer#footer ul li a {
            width: 30px;
            height: 30px;
            line-height: 35px;
            text-align: center;
            color: rgb(255 255 255 / 0.8);
            display: inline-block;
            border-radius: 50px;
            border: 1px solid white;
            background-color: transparent;
            margin-bottom: 0.5rem;
            transition: 0.3s all ease-in-out;
        }

        footer#footer ul li a:hover {
            color: #000;
            background-color: rgb(255 255 255 / 0.8);
        }

        #responseMessage {
            max-width: 500px;
            margin: 2rem auto 1.5rem;
            background-color: darkslategrey;
            box-sizing: border-box;
            color: white !important;
            font: 400 12px/normal var(--font-one);
            text-align: center;
            border-radius: 4px;
            letter-spacing: 1px;
        }

        @media(max-width: 767px) {
            .commingTitle h3 {
                font-size: 36px;
            }
        }
    </style>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Validate form fields
            let isValid = true;
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email validation regex

            $('#contactForm input').each(function() {
                if ($(this).val().trim() === '') {
                    isValid = false;
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', '');
                }
            });

            // Validate name
            const name = $('#name').val().trim();
            if (name.length < 3) {
                isValid = false;
                $('#name').css('border', '1px solid red');
                $('#responseMessage').text('Name must be at least 3 characters long.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            } else {
                $('#name').css('border', '');
            }

            // Validate email
            const email = $('#email').val().trim();
            if (!emailRegex.test(email)) {
                isValid = false;
                $('#email').css('border', '1px solid red');
                $('#responseMessage').text('Please enter a valid email address.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            } else {
                $('#email').css('border', '');
            }

            if (!isValid) {
                $('#responseMessage').text('Please fill in all required fields.').css({
                    'color': 'maroon',
                    'padding': '8px 10px'
                }).fadeIn();
                return;
            }

            const submitButton = $('#contactForm button[type="submit"]');
            submitButton.prop('disabled', true).text('Submitting...');

            // Send AJAX request
            $.ajax({
                url: '{{ route('contact_submit') }}', // Backend PHP script
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#responseMessage').text(response.message).css({
                        'color': 'darkslategrey',
                        'padding': '8px 10px'
                    }).fadeIn();
                    $('#contactForm')[0].reset(); // Reset the form
                },
                error: function(xhr, status, error) {
                    $('#responseMessage').text('An error occurred. Please try again.').css({
                        'color': 'maroon',
                        'padding': '8px 10px'
                    }).fadeIn();
                },
                complete: function() {
                    // Re-enable the button after the request is complete
                    submitButton.prop('disabled', false).text('Submit');
                }
            });
        });
    });
</script>
