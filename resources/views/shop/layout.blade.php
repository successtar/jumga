@extends('layouts.app')

@section('content')

<!-- Title Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <h3><a href="/shop/{{$shop->slug}}">{{$shop->shop_name}}</a></h3>
        <p>{{$shop->shop_description}}...</p>
    </div>
</div>
<!-- Tile End -->

@yield('shop_content')


<script> var shop = "x-{{$shop->slug}}"</script>


@endsection

