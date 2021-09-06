@extends('layouts.master')

@section('css')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
<link href="{{ asset('cart/cart.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="cart_wrapper">
        @include('product.components.show_cart')
    </div>
@endsection

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('cart/cart.js') }}"></script>
@endsection