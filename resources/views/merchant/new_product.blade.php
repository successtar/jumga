@extends('shop.layout')

@section('shop_content')



<div class="m-5" >
    <div class="table-responsive px-5 pt-4 bg-white cart-page">
        <h3 class="mb-4" >New Product</h3>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card border-0 my-5">

                        <div class="card-body p-5">
                            <form method="POST" enctype="multipart/form-data" action="/merchant/product/new">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  minlength="4" name="name" value="{{ old('name') }}" required autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 offset-md-3">
                                        <div class="form-group row">
                                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price ($)') }}</label>

                                            <div class="col-md-8">
                                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required >

                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="quantity" class="col-md-6 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                            <div class="col-md-6">
                                                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required >

                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"  minlength="20" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" accept=".jpg,.jpeg,.png" class="form-control @error('image') is-invalid @enderror" name="image" required >
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
