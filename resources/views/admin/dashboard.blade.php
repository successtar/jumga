@extends('layouts.app')

@section('content')

<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white">
        <h3 class="mb-4" >Admin Dashboard</h3>
        <div class='row my-5'>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Income Balance
                </h5>
                <a href="{{ route('admin.dashboard', [], false) }}" class="display-1 font-weight-bold">
                    ${{number_format($data['account_balance'], 2)}}
                </a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Merchants
                </h5>
                <a href="{{ route('admin.merchant', [], false) }}" class="display-1 font-weight-bold">
                    {{number_format($data['merchant'])}}
                </a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Products
                </h5>
                <a href="{{ route('admin.product', [], false) }}" class="display-1 font-weight-bold">
                    {{number_format($data['product'])}}
                </a>
            </div>
        </div>
        <div class='row my-5'>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Transactions
                </h5>
                <a href="{{ route('admin.transaction', [], false) }}" class="display-1 font-weight-bold">
                    {{number_format($data['transaction'])}}
                </a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Orders
                </h5>
                <a href="{{ route('admin.order', [], false) }}" class="display-1 font-weight-bold">
                    {{number_format($data['order'])}}
                </a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-secondary">
                    Shop Fee
                </h5>
                <a href="{{ route('admin.transaction', [], false) }}" class="display-1 font-weight-bold">
                    {{number_format($data['fee'])}}
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
