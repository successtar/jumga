@extends('shop.layout')

@section('shop_content')

<!-- Checkout Start -->
<form method="POST" id="place-order" action="#">
    @csrf
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Customer Information</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" name="first_name" required type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input class="form-control" name="last_name" required type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email"  required type="email" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" name="phone"  required type="phone" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" name="address" type="text" required placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select name="country" required class="custom-select">
                                        <option></option>
                                        <option >Nigeria</option>
                                        <option>Ghana</option>
                                        <option>Kenya</option>
                                        <option>United Kingdom</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input name="city" required class="form-control" type="text" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input name="state" required class="form-control" type="text" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label>Postal / ZIP Code</label>
                                    <input name="zip" class="form-control" type="text" placeholder="ZIP Code">
                                </div>

                            </div>
                        </div>

                        <div class="shipping-address">
                            <h2>Shipping Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary" id="checkout-summary">
                            <h1>Order Summary</h1>
                            <p>Sub Total<span id="item-total"></span></p>
                            <p>Dispatch Cost<span id="item-dispatch"></span></p>
                            <h2>Grand Total<span id="item-grand-total"></span></h2>
                        </div>

                        <div class="checkout-payment">
                            <div class="checkout-btn">
                                <button type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Checkout End -->


@endsection
