@extends('layouts.app')

@section('content')

<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white">
        <h3 class="mb-4" >Transactions</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Destination</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $tranx)
                    <tr>
                        <td>
                            <a href="/shop/{{$tranx->user->slug}}" target="_blank">
                                {{$tranx->user->shop_name}}
                            </a>
                        </td>
                        <td>
                            {{$tranx->email}}
                        </td>
                        <td>${{$tranx->amount}}</td>
                        <td>{{$tranx->status}}</td>
                        <td>{{$tranx->type}}</td>
                        <td>{{$tranx->category}}</td>
                        <td>{{date("D\, M d\, Y\, h:i:s A", strtotime($tranx->updated_at))}}</td>
                        <td>{{date("D\, M d\, Y\, h:i:s A", strtotime($tranx->created_at))}}</td>
                    </tr>

                @endforeach

                @if ($transactions->total() == 0)
                    <tr> <td colspan="10"><h4 class="text-center">No Record Found</h3></td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Pagination Start -->
<div class="product-view m-n5 pb-5">
    <div class="text-center pagination justify-content-center">
        {{ $transactions->links() }}
    </div>
</div>
<!-- Pagination Start -->


@endsection
