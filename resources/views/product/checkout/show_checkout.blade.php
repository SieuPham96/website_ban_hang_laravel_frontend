@extends('layouts.master')

@section('css')
<link href="{{ asset('cart/cart.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('chekout/login.css') }}">
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <div class="bill-to">
                        <p>Thông tin người gửi</p></p>
                        <div class="form-one">
                            <form action="{{ route('saveCheckoutCustomer') }}" method="post">
                                @csrf
                                <input type="text" 
                                        name="name" 
                                        class="@error('name') is-invalid @enderror"
                                        placeholder="Họ tên"
                                        value="{{ old('name') }}"
                                >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="text" 
                                        name="email" 
                                        class="@error('email') is-invalid @enderror"
                                        placeholder="Email"
                                        value="{{ old('email') }}"
                                >
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="text" 
                                        name="phone" 
                                        class="@error('phone') is-invalid @enderror"
                                        placeholder="SĐT"
                                        value="{{ old('phone') }}"
                                >
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <textarea name="address" 
                                            rows="5" 
                                            class="@error('address') is-invalid @enderror"
                                            placeholder="Địa chỉ">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <input type="submit" value="Đặt hàng" name="send-order" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="cart" data-url="{{ route('deleteCart') }}">
            <div class="container">
                <div class="row">
                    <table class="table update-cart-url" data-url="{{ route('updateCart') }}">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Sub total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @if( is_array($carts) || is_object($carts) )
                                @foreach( $carts as $id => $cartItem )
                                    @php
                                        $total += $cartItem['price'] * $cartItem['quantity'];
                                    @endphp
                                    <tr>
                                        <th>{{ $id }}</th>
                                        <td><img src="{{ $cartItem['image'] }}" alt="" class="cart-img"></td>
                                        <td>{{ $cartItem['name'] }}</td>
                                        <td>{{ number_format($cartItem['price']) }} VND</td>
                                        <td>
                                            <input type="number" value="{{ $cartItem['quantity'] }}" min="1" class="quantity">
                                        </td>
                                        <td>{{ number_format($cartItem['price'] * $cartItem['quantity']) }} VND</td>
                                        <td>
                                            <a href="" data-id="{{ $id }}" class="btn btn-info cart-update">Cập nhật</a>
                                            <a href="" data-id="{{ $id }}" class="btn btn-danger cart-delete">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td><strong>{{ number_format($total) }} VND</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('cart/cart.js') }}"></script>
@endsection
