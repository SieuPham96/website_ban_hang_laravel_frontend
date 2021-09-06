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
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="{{ route('home') }}" class="btn btn-lg btn-block btn-info">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php
                            $customerId = session()->get('customer_id');
                            if( !empty($customerId) ){
                        ?>    
                                <a href="{{ route('checkout') }}" class="btn btn-lg btn-block btn-success">Thanh toán</a>
                        <?php
                            }
                            else {
                        ?>
                                <a href="{{ route('loginCheckout') }}" class="btn btn-lg btn-block btn-success">Thanh toán</a>
                        <?php
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
