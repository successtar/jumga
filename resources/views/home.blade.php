@extends('layouts.app')

@section('content')
<!-- Main Slider Start -->
<div class="header">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="header-slider normal-slider">
                    @foreach ($shops as $shop)
                        <div class="header-slider-item">
                            <img src="img/slide-{{$loop->index}}.jpg" class="img-fluid"  alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>{{$shop->shop_name}}</p>
                                <p class="small"><small> {{$shop->shop_description}}</small> </p>
                                <a class="btn" href="/shop/{{$shop->slug}}"><i class="fa fa-shopping-cart"></i>Go To Shop</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Main Slider End -->

<!-- Feature Start-->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>Secure Payment</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Fast Delivery</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>90 Days Return</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>24/7 Support</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->

<!-- Featured Product Start -->
<div id="feature" class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Featured Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">

            @foreach ($features as $feature)
                <div class="col-lg-3">
                    <div class="d-flex flex-column product-item align-items-center px-3">
                        <div class="product-title w-100">
                            <a href="#">{{$feature->name}}</a>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                <img src="{{$feature->image_path}}" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <p>
                                    {{$feature->description}}
                                    <br/>
                                    Quantity: {{$feature->available}}
                                </p>
                            </div>
                        </div>
                        <div class="product-price w-100">
                            <h3><span>$</span>{{$feature->price}}</h3>
                            <a href="/shop/{{$feature->user->slug}}" class="btn add-to-cart" ><i class="fa fa-shopping-cart"></i>Go to Shop</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Featured Product End -->

<!-- Recent Product Start -->
<div id="recent" class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Recent Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">

            @foreach ($recents as $recent)
                <div class="col-lg-3">
                    <div class="d-flex flex-column product-item align-items-center px-3">
                        <div class="product-title w-100">
                            <a href="#">{{$recent->name}}</a>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                <img src="{{$recent->image_path}}" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <p>
                                    {{$recent->description}}
                                    <br/>
                                    Quantity: {{$recent->available}}
                                </p>
                            </div>
                        </div>
                        <div class="product-price w-100">
                            <h3><span>$</span>{{$recent->price}}</h3>
                            <a href="/shop/{{$recent->user->slug}}" class="btn add-to-cart" ><i class="fa fa-shopping-cart"></i>Go to Shop</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Recent Product End -->

@endsection
