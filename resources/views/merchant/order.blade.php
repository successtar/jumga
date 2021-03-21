@extends('shop.layout')

@section('shop_content')


<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white">
        <h3 class="mb-4" >Orders</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Jumga Fee</th>
                    <th>Dispatch</th>
                    <th>Total</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <p>
                                {{$order->first_name}} {{$order->last_name}}
                            </p>
                            <p>
                                {{$order->phone}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$order->email}}
                            </p>
                            <p>
                                {{$order->address}} {{$order->city}} {{$order->state}} ({{$order->country}})
                            </p>

                        </td>
                        <td>
                            @foreach (json_decode($order->items) as $item)
                                <p>
                                    <a href="{{$item->image}}" target="_blank">{{$item->name}} x {{$item->unit}} </a>
                                </p>
                            @endforeach
                        </td>
                        <td>{{$order->status}}</td>
                        <td>${{$order->amount}}</td>
                        <td>${{$order->jumga_fee}}</td>
                        <td>${{$order->dispatch}}</td>
                        <td>${{$order->total}}</td>
                        <td>{{date("D\, M d\, Y\, h:i:s A", strtotime($order->updated_at))}}</td>
                        <td>{{date("D\, M d\, Y\, h:i:s A", strtotime($order->created_at))}}</td>
                    </tr>

                @endforeach

                @if ($orders->total() == 0)
                    <tr> <td colspan="10"><h4 class="text-center">No Record Found</h3></td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Pagination Start -->
<div class="product-view m-n5 pb-5">
    <div class="text-center pagination justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
<!-- Pagination Start -->


@endsection
