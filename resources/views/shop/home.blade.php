@extends('shop.layout')

@section('shop_content')

 <!-- Product List Start -->
 <div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row ">
                    @foreach ($products as $product)


                        <div class="col-md-4">
                            <div class="d-flex flex-column product-item align-items-center">
                                <div class="product-title w-100">
                                    <a href="/product/{{$product->id}}">{{$product->name}}</a>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="{{$product->image_path}}" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <p>
                                            {{$product->description}}
                                            <br/>
                                            Quantity: {{$product->available}}
                                        </p>
                                    </div>
                                </div>
                                <div class="product-price w-100">
                                    <h3><span>$</span>{{$product->price}}</h3>
                                    <button class="btn add-to-cart" data-id="{{$product->id}}" data-image="{{$product->image_path}}" data-name="{{$product->name}}" data-price="{{$product->price}}" ><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach


                @if ($products->total() == 0)
                    <div class="col-md-12 text-center"><h4>No Product Available, check back later </h3></div>
                @endif
                </div>


                <!-- Pagination Start -->
                <div class="col-md-12 pagination justify-content-center">
                    {{ $products->links() }}
                </div>
                <!-- Pagination Start -->
            </div>

        </div>
    </div>
</div>
<!-- Product List End -->


@endsection
