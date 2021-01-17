@extends('shop.layout')

@section('shop_content')

{{-- <form method="POST" enctype="multipart/form-data" action="{{ route('test') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

        <div class="col-md-6">
            <input id="email" type="file" class="form-control" name="product_image"  required />

            @error('product_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <input id="email" type="text" class="form-control" name="product_name"  required />

        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('upload') }}
        </button>
    </div>
</form> --}}

 <!-- Product List Start -->
 <div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($products as $product)


                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="/product/{{$product->product_id}}">{{$product->name}}</a>
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
                                <div class="product-price">
                                    <h3><span>$</span>{{$product->price}}</h3>
                                    <button class="btn add-to-cart" data-id="{{$product->product_id}}" data-image="{{$product->image_path}}" data-name="{{$product->name}}" data-price="{{$product->price}}" ><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
