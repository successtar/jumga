@extends('shop.layout')

@section('shop_content')

@if(Session::has('message'))
    <div class="px-5">
        <p class="alert alert-danger mx-4">{{ Session::get('message') }}</p>
    </div>
@endif

<!-- Cart Start -->
<form method="POST" action="/shop/{{$shop->slug}}/checkout">
    @csrf
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle" id="cart-items">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Cart Summary</h1>
                                        <p>Sub Total<span id="item-total"></span></p>
                                        <p>Dispatch Cost<span id="item-dispatch"></span></p>
                                        <h2>Grand Total<span id="item-grand-total"></span></h2>
                                    </div>
                                    <div class="cart-btn">
                                        <button disabled="disabled" id="checkout-btn" type="submit" class="w-100">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Cart End -->

@endsection
