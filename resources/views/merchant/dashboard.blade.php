@extends('shop.layout')

@section('shop_content')

<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white">
        <h3 class="mb-4" >Dashboard</h3>
        <div class='row my-5'>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Account Balance
                </h5>
                <a href="{{ route('merchant.dashboard') }}" class="display-1 font-weight-bold">
                    ${{number_format($shop->account_balance, 2)}}
                </a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Products
                </h5>
                <a href="{{ route('merchant.product') }}" class="display-1 font-weight-bold">
                    {{$data['product']}}
                </a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Orders
                </h5>
                <a href="{{ route('merchant.order') }}" class="display-1 font-weight-bold">
                    {{$data['order']}}
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
