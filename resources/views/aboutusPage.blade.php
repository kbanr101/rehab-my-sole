@extends('include.master')
@section('content')
{{-- <div class="pageNavigaton pt-4 pb-4">
    <div class="custom-container">
        <div class="pageContainer">
            <div class="pageItem">
                <h3>About us</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab iste, eius quidem iusto numquam dolorem aspernatur eos voluptatibus ducimus. Totam tenetur iste ut magnam.</p>
            </div>
        </div>
    </div>
</div> --}}
<section class="serviceSection pt-4 mt-4 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center x2_title m-auto pb-5">
            <h3>About us</h3>
            <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis illum sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum quod itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="aboutBox">
                    <div class="aboutBox-item w-100">
                        <img src="{{ asset('assets/media/background-landing.png') }}" width="" height="" class="img-fluid" alt="About Us" />
                    </div>
                    <div class="aboutBox-item w-100">
                        <img src="{{ asset('assets/media/background-landing.png') }}" width="" height="" class="img-fluid" alt="About Us" />
                    </div>
                    <div class="aboutBox-item w-100">
                        <img src="{{ asset('assets/media/background-landing.png') }}" width="" height="" class="img-fluid" alt="About Us" />
                    </div>
                    <div class="aboutBox-item w-100">
                        <img src="{{ asset('assets/media/background-landing.png') }}" width="" height="" class="img-fluid" alt="About Us" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <p class="text-center mx-700">Our aim at Rehab My Sole is to value and restore the meaning and history of every shoe. Our commitment is to restyle footwear which needs restoration. Through our easy drop-off and pick-up system you can now conveniently take your shoes to our specialists for their expert care services. </p>
            </div>
        </div>
    </div>
</section>
<section class="aboutMission pt-5 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>Our Mission & Vision</h3>
            <p class="m-auto">At Rehab My Sole we restore footwear to its original condition for our customers. We operate out of Oregon City by returning poorly used or worn shoes to their original condition and making custom modifications according to your preferences. We will maintain quality for your footwear regardless of its condition from everyday shoes to formal heels.</p>
        </div>
    </div>
</section>
<section class="aboutMeet pt-4 pb-5">
    <div class="custom-container">
        <div class="mainTitle text-center m-auto pb-5">
            <h3>Our Mission & Vision</h3>
            <p class="m-auto">Rorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
        </div>
        <div class="meetBlock">
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/background-landing.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
                </div>
            </div>
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
                </div>
            </div>
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
                </div>
            </div>
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
                </div>
            </div>
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
                </div>
            </div>
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
                </div>
            </div>
            <div class="meetBlock-item">
                <div class="meetFigure">
                    <img src="{{ asset('assets/media/profle.png') }}" width="" height="" class="img-fluid" alt="Profile" />
                    <h4>First and Last Name</h4>
                    <span>Position Held</span>
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
                <button type="button" class="w-100 defaultBtnClass" aria-label="Submit Button">Send</button>
            </div>
        </div>
    </div>
</section>
@endsection
