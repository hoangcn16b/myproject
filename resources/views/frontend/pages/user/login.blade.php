@extends('frontend.main')
@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Login</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home/frontend') }}">Home</a>
                        <span>Login</span>
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
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="checkout__input">
                                        <p>Username/Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Password<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ route('user/register') }}">
                                        <button type="button" class="site-btn">Don't have account, register now!</button>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="site-btn">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
