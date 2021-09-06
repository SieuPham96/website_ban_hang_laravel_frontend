@extends('layouts.master')

@section('title')
    <title>Home page</title>
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
                    @include('home.components.feature_product')

                    <!--category-tab-->
                    @include('home.components.category_tab')

                    <!--recommended_items-->
                    @include('home.components.recommend_product')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
    <script src="{{ asset('cart/cart.js') }}"></script>
@endsection

