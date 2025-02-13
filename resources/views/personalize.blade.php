@extends('include.master')
@section('content')
    <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('personalize') }}">Personalize</a></li>
            </ul>
        </div>
    </div>
    <section class="serviceSection pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-left m-auto pb-5">
                <h3>Personalize your service</h3>
                <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet, esse omnis illum sed nihil, debitis dolorum quae pariatur harum asperiores quidem saepe quas, necessitatibus earum quod itaque. Molestias expedita eveniet aliquid cupiditate? Consectetur cumque error ipsam?</p>
            </div>
            <div class="Personalize_form">
                <form method="GET" action="{{ route('personalize') }}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="form-title">Basic Information</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Enter your first name</label>
                                 <input  class="form-control" type="name" id="name" name="name" value="" placeholder="John" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="lname">Enter your last name</label>
                                 <input  class="form-control" type="lname" id="lname" name="lname" value="" placeholder="Doe" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Enter your  email address</label>
                                 <input  class="form-control" type="email" id="email" name="email" value="" placeholder="example@gmail.com" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone">Enter your phone number</label>
                                 <input  class="form-control" type="phone" id="phone" name="phone" value="" placeholder="+91 98 765 4321" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="form-title">Appointment Information</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="service">Service type</label>
                                <select class="form-control" id="service" name="service">
                                    <option value="Choose service type">Choose service type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="date">Date</label>
                                 <input  class="form-control" type="date" id="date" name="date" value="" placeholder="Pick date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="street">Street address</label>
                                 <input  class="form-control" type="text" id="street" name="street" value="" placeholder="Street address" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="city">City</label>
                                 <input  class="form-control" type="text" id="city" name="city" value="" placeholder="city" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="form-title">Shoe Information</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="number_shoes">Number of shoes</label>
                                 <input  class="form-control" type="number" id="number_shoes" name="number_shoes" value="" placeholder="Number of shoes" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="image">Upload image</label>
                                <div class="fileupload">
                                     <input type="file" id="imageUpload" accept="image/*" multiple hidden>
                                    <label for="imageUpload" class="defaultBtnClass trBtnClass">Upload from device</label>
                                    <div class="image-preview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="comments">Comments (what should we know?)</label>
                                <textarea class="form-control" rows="5" type="text" id="comments" name="comments" value="" placeholder="Comments (what should we know?)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{-- <button type="submit" class="defaultBtnClass" href="#">Send your request</button> --}}
                            <a class="defaultBtnClass" href="{{ route('checkout') }}">Send your request</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
