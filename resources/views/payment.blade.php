@extends('include.master')
@section('content')
    <div class="pageNavigaton">
        <div class="custom-container">
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i>&nbsp;Home</a></li>
                <li><a href="{{ route('personalize') }}">Personalize</a></li>
                <li><a href="{{ route('payment') }}">Payment</a></li>
                <li><a href="{{ route('checkout') }}">Checkout</a></li>
            </ul>
        </div>
    </div>
    <section class="serviceSection pt-5 pb-5">
        <div class="custom-container">
            <div class="mainTitle text-left m-auto pb-5">
                <h3>Payment for shoe cleaning</h3>
                <p class="mb-3">Rorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
            </div>
            <div class="checkout_form">
            <div class="row">
                <div class="col-md-8">
                    <div class="active_timeline">
                        <div class="listTime active" data-number="1">Shipping</div>
                        <div class="listTime active" data-number="2">Payment</div>
                        <div class="listTime" data-number="3">Successful</div>
                    </div>
                    <form>
                        <div class="shipping-detail card-box">
                            <h3 class="form-title">Card details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="name">Enter card number</label>
                                        <input  class="form-control" type="name" id="name" name="name" value="" placeholder="1234 3423 2344 3433" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="lname">Expiry date</label>
                                        <input  class="form-control" type="lname" id="lname" name="lname" value="" placeholder="12/22" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="phone">CVV</label>
                                        <input  class="form-control" type="phone" id="phone" name="phone" value="" placeholder="003" />
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mt-1 mb-2">
                                    {{-- <button type="submit" class="defaultBtnClass w-100" href="#">Proceed to payment</button> --}}
                                    <a class="defaultBtnClass w-100" href="{{ route('successful') }}">Proceed to payment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="billing-summary card-box">
                        <form class="summary-item">
                            <h3 class="form-side-title mb-4">Billing Summary</h3>
                            <div class="price-list">Cost of cleaning <span>$100</span></div>
                            <div class="price-list">Discount <span>-$0</span></div>
                            <div class="price-list">Shipping <span>$0.00</span></div>
                            <hr>
                            <h3 class="subtotal price-list">Grand Total<span>$100</span></h3>
                            <div class="form-side-title-small mb-2 mt-3">Order comment</div>
                            <div class="form-group">
                                <textarea type="text" placeholder="Type here" rows="4" class="form-control"></textarea>
                            </div><br>
                            <div class="checkbox-group">
                                <input type="checkbox" class="form-control" id="sideCheckbox" hidden>
                                <label for="sideCheckbox"></label>
                                <span>Please check to acknowledge our <a href="#privacy">Privacy</a> & <a href="#terms-policy">Terms Policy</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
