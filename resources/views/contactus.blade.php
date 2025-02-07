@extends('include.master')
@section('content')
    <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('contactus') }}">Contact Us</a></li>
            </ul>
            {{-- <div class="pageContainer">
                <div class="pageItem">
                    <h3>About us</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab iste, eius quidem iusto numquam dolorem aspernatur eos voluptatibus ducimus. Totam tenetur iste ut magnam.</p>
                </div>
            </div> --}}
        </div>
    </div>
    <section class="joinForms pt-3 pb-5">
        <div class="container pt-4 pb-4">
            <div class="mainTitle text-center m-auto pb-5">
                <h3>Contact us</h3>
                <p class="m-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores qui amet.</p>
            </div>
            <form action="method" class="queryForm row">
                <div class="form-group mb-3 col-md-6">
                    <label for="name">Enter your full name</label>
                    <input type="text" name="name" placeholder="Enter your full name" class="form-control"
                        autocomplete="off" />
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label for="email">Enter your email address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address"
                        class="form-control" autocomplete="off" />
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label for="message">Type your message</label>
                    <textarea type="text" rows="5" id="message" name="message" placeholder="Type your message"
                        class="form-control" autocomplete="off"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="button" class="w-100 defaultBtnClass" aria-label="Submit Button">Send</button>
                </div>
            </form>
        </div>
    </section>
    @include('sweetalert::alert')
@endsection
