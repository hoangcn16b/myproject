@extends('frontend.main')
@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Confirm Order</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Confirm Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Your information</h6>
                                {{-- <div class="checkout__order__products">Product <span>Total</span></div> --}}
                                <ul class="checkout__total__products">
                                    <li><samp>01.</samp> Fullname <span>user123</span></li>
                                    <li><samp>02.</samp> Email <span>user@gmail.com</span></li>
                                    <li><samp>03.</samp> address <span>101 p26</span></li>
                                    <li><samp>04.</samp> Phone <span>0123456789</span></li>
                                    <li><samp>04.</samp> Order Notes <span>giao nhanh</span></li>
                                </ul>
                            </div>

                            <div class="checkout__order">
                                <h6 class="order__title">Your order</h6>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <li><samp>01.</samp> Vanilla salted caramel <span>$ 300.0</span></li>
                                    <li><samp>02.</samp> German chocolate <span>$ 170.0</span></li>
                                    <li><samp>03.</samp> Sweet autumn <span>$ 170.0</span></li>
                                    <li><samp>04.</samp> Cluten free mini dozen <span>$ 110.0</span></li>
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>$750.99</span></li>
                                    <li>Total <span>$750.99</span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">CONFIRM ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="continue__btn">
                        <a href="{{ route('cart/checkout') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
