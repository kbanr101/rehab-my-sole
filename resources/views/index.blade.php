@extends('include.master')
@section('content')
<section class="herobanner pt-5 pb-5 mt-5 mb-5">
    <div class="container">
        <div class="centerContent text-center m-auto">
            <h3>An engaging heading. An engaging heading.</h3>
            <p>Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
            <a class="defaultClass" href="#">Book us now</a>
        </div>
    </div>
</section>
<section class="videoSection">
    <div class="video-section">
        <img src="{{ asset('assets/media/shoe-video-bg.jpg') }}" alt="Video Thumbnail" class="video-thumbnail" id="thumbnail">
        <button class="play-button" id="playButton"><i class="fas fa-play"></i></button>
    </div>
    <div class="video-popup" id="videoPopup">
        <button class="close-button" id="closeButton">&times;</button>
        {{-- <video id="video" controls>
            <source src="video.mp4" type="video/mp4">Your browser does not support the video tag.
        </video> --}}
    </div>
</section>
<section class="serviceSection pt-5 pb-5">
    <div class="container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>Choose a Service</h3>
            <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis illum sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum quod itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage mb-2">
                        <img src="{{ asset('assets/media/service-img.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                        {{-- <h4>Customize shoes</h4> --}}
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus laborum facere quidem molestiae possimus doloribus reprehenderit! Aliquam recusandae laborum libero, perspiciatis fugit beatae sed quis porro quidem quam quia neque!</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage mb-2">
                        <img src="{{ asset('assets/media/service-img.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                        {{-- <h4>Customize shoes</h4> --}}
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus laborum facere quidem molestiae possimus doloribus reprehenderit! Aliquam recusandae laborum libero, perspiciatis fugit beatae sed quis porro quidem quam quia neque!</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage mb-2">
                        <img src="{{ asset('assets/media/service-img.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                        {{-- <h4>Customize shoes</h4> --}}
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus laborum facere quidem molestiae possimus doloribus reprehenderit! Aliquam recusandae laborum libero, perspiciatis fugit beatae sed quis porro quidem quam quia neque!</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="serviceCard">
                    <div class="serviceImage mb-2">
                        <img src="{{ asset('assets/media/service-img.png') }}" alt="Customize shoes" class="img-fluid w-100" />
                        {{-- <h4>Customize shoes</h4> --}}
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus laborum facere quidem molestiae possimus doloribus reprehenderit! Aliquam recusandae laborum libero.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="joinForm pt-5 pb-5">
    <div class="container pt-4 pb-4">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>Contact us</h3>
            <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet.</p>
        </div>
        <form action="method" class="queryForm row">
            <div class="form-group mb-3 col-md-6">
                <label for="name">Enter your full name</label>
                <input type="text" name="name" placeholder="Enter your full name" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mb-3 col-md-6">
                <label for="email">Enter your email address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mb-3 col-md-12">
                <label for="message">Type your message</label>
                <textarea type="text" rows="5" id="message" name="message" placeholder="Type your message" class="form-control" autocomplete="off"></textarea>
            </div>
            <div class="form-group col-md-12">
                <button type="button" class="w-100 defaultClass" aria-label="Submit Button">Send</button>
            </div>
        </div>
    </div>
</section>
@endsection
