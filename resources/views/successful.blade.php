@extends('include.master')
@section('content')
    {{-- <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('personalize') }}">Personalize</a></li>
                <li><a href="{{ route('successful') }}">Checkout</a></li>
                <li><a href="{{ route('successful') }}">Successful</a></li>
            </ul>
        </div>
    </div> --}}
    <section class="serviceSection pt-4 pb-5">
        <div class="custom-container">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="active_timeline">
                            <div class="listTime active" data-number="1">Shipping</div>
                            <div class="listTime active" data-number="2">Payment</div>
                            <div class="listTime active" data-number="3">Successful</div>
                        </div>
                        <div class="payment-successful">
                            <img src="{{ asset('assets/media/rehab-bg.png') }}" alt="Rehabmysole" class="w-100 img-fluid" height="300" width="300" />
                            <div class="successfulContent">
                                <h3>Payment Sucessful</h3>
                                <p>Thank you for your payment. An automated payment recepit would be sent to your email</p>
                                <div class="col-md-12 text-center mt-1 mb-2">
                                    <a class="defaultBtnClass" href="{{ url('/') }}">Go back to home page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
