@extends('layouts.app')

@section('content')

<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white">
        <h3 class="mb-4" >Merchant</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Shop</th>
                    <th>Owner</th>
                    <th>Status</th>
                    <th>Account Balance</th>
                    <th>Dispatch Balance</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($merchants as $merchant)
                    <tr>
                        <td>
                            <p>
                                {{$merchant->shop_name}}
                            </p>
                            <p>
                                {{$merchant->shop_description}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$merchant->first_name}} {{$merchant->last_name}}
                            </p>
                            <p>
                                {{$merchant->email}} ({{$merchant->phone}})
                            </p>
                            <p>
                                {{$merchant->address}} {{$merchant->city}} {{$merchant->state}} ({{$merchant->country}})
                            </p>

                        </td>
                        <td>{{$merchant->status}}</td>
                        <td>${{number_format($merchant->account_balance, 2)}}</td>
                        <td>${{number_format($merchant->dispatch_balance, 2)}}</td>
                        <td>{{$merchant->updated_at}}</td>
                        <td>{{$merchant->created_at}}</td>
                    </tr>

                @endforeach

                @if ($merchants->total() == 0)
                    <tr> <td colspan="10"><h4 class="text-center">No Record Found</h3></td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Pagination Start -->
<div class="product-view m-n5 pb-5">
    <div class="text-center pagination justify-content-center">
        {{ $merchants->links() }}
    </div>
</div>
<!-- Pagination Start -->


@endsection
