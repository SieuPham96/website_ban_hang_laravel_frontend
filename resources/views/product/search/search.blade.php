@extends('layouts.master')

@section('title')
    <title>Search</title>
@endsection

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
    <link href="{{ asset('cart/cart.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- slider --}}
    @include('home.components.slider')

    <section>
        <div class="container">
            <div class="row">
                {{-- sidebar --}}
                @include('components.sidebar')

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
<div class="features_items">
    <h2 class="title text-center">KẾT QUẢ TÌM KIẾM</h2>

    @foreach($searchProduct as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ config('app.base_url').$product->feature_image_path }}" alt="" />
                        <h2>{{ number_format($product->price) }} VND</h2>
                        <p>{{ $product->name }}</p>
                        <a href=""
                            data-url="{{ route('addToCart', ['id' => $product->id]) }}"
                            class="btn btn-default add-to-cart"
                        >
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ number_format($product->price) }} VND</h2>
                            <p>{{ $product->name }}</p>
                            <a href=""
                                data-url="{{ route('addToCart', ['id' => $product->id]) }}"
                                class="btn btn-default add-to-cart"
                            >
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li>
                            <a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>


                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
    <script src="{{ asset('cart/cart.js') }}"></script>
@endsection

