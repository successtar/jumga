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
                            <div class="col-md-6">
                                <label for="first-name">First Name</label>
                                <input id="first-name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" type="text" placeholder="First Name" required autofocus>
                                @error('name')
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
