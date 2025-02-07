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
        @include('contactForm')
    </section>
    @include('sweetalert::alert')
@endsection
