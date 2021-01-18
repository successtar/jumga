@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8  py-5 my-5">
            <div class="card border-0 p-5">

                <div class="card-body">
                    <p class="h5">
                        {{ __('One last step, you are required to pay a token of $20 to get your shop up running.') }}
                        {{ __('Also note that Jumga get 2% for every sale and dispatch for delivering items to your customer cost $20.') }}
                    </p>
                    <br/>
                    <p class="text-center">
                        <button type="button" id="activate-shop" class="btn ">{{ __('Activate Account') }}</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<script> var shop = "x-{{Auth::user()->slug}}"</script>

<script src="https://checkout.flutterwave.com/v3.js"></script>

@endsection
