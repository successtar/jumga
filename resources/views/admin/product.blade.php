@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="px-5">
        <p class="alert alert-success mx-4">{{ Session::get('message') }}</p>
    </div>
@endif


@error('id')
    <div class="px-5">
        <p class="alert alert-danger mx-4">{{ $message }}</p>
    </div>
@enderror

<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white cart-page">
        <h3 class="mb-4" >Products </h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Product</th>
                    <th>Shop</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Available</th>
                    <th>Sold</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>

                            <div class="img">
                                <a href="{{$product->image_path}}"><img src="{{$product->image_path}}" alt="Image"></a>
                                <div class="text-left">
                                    <p>{{$product->name}}</p>
                                    <br/>
                                    <p class="small ">{{$product->description}} </p>
                                </div>
                            </div>
                        </td>
                        <td>{{$product->user->shop_name}}</td>
                        <td>${{$product->price}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->available}}</td>
                        <td>{{$product->sold}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>

                            <form id="logout-form" action="{{ route('admin.delete-product', [], false) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}" />
                                <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                @endforeach

                @if ($products->total() == 0)
                    <tr> <td colspan="8"><h4>No Record Found</h3></td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- Pagination Start -->
<div class="product-view m-n5 pb-5">
    <div class="text-center pagination justify-content-center">
        {{ $products->links() }}
    </div>
</div>
<!-- Pagination Start -->

@endsection
