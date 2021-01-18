@extends('layouts.app')

@section('content')
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="register-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="shop-name">Shop Name</label>
                                <input id="shop-name" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" minlength="4" value="{{ old('shop_name') }}" type="text" placeholder="Shop Name" required autofocus>
                                @error('shop_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="shop-description">Shop Description</label>
                                <input id="shop-description" class="form-control @error('shop_description') is-invalid @enderror" name="shop_description" minlength="20" value="{{ old('shop_description') }}" type="text" placeholder="Shop Description" required>
                                @error('shop_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="first-name">First Name</label>
                                <input id="first-name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" type="text" placeholder="First Name" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last-name">Last Name</label>
                                <input id="last-name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  type="text" placeholder="Last Name" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">E-mail</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  type="text" placeholder="E-mail" pattern="[a-z0-9\._%+!$&*=^|~#%'`?{}/\-]+@([a-z0-9\-]+\.){1,}([a-z]{2,16})" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Mobile No</label>
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  type="text" placeholder="Mobile No" pattern="([0-9\+]+){8,15}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="user-type">User Type</label>
                                <input id="user-type" class="form-control" type="text" value="Merchant" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="currency">Currency</label>
                                <input id="currency" class="form-control" type="text" value="USD ($)" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password" required minlength="8">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirmation">Retype Password</label>
                                <input id="password-confirmation" class="form-control"  name="password_confirmation" type="password" placeholder="Password" minlength="8" required>
                            </div>

                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" type="text" required placeholder="Address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Country</label>
                                <select name="country" required class="custom-select @error('country') is-invalid @enderror" value="{{ old('country') }}">
                                    <option value="">Country</option>
                                    <option value="NG" >Nigeria</option>
                                    <option value="GH">Ghana</option>
                                    <option value="KE">Kenya</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <input name="city" required class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" type="text" placeholder="City">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>State</label>
                                <input name="state" required class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" type="text" placeholder="State">
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Postal / ZIP Code</label>
                                <input name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip') }}" type="text" placeholder="ZIP Code">
                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-4">
                                <button class="btn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
