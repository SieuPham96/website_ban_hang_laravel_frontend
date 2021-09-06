@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>ORDER STATUS</h1>
        <div class="col-12">
            <div class="col-md-12">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>

            <div class="row col-lg-12">
                <div class="col">
                    <h2>Order Info</h2>
                    <?php
                        $total = 0;
                    ?>
                    @foreach($orders as $order)
                        <?php
                            $total += $order->total;
                        ?>
                    @endforeach
                        <p><b>Order ID: </b>{{ '#'.$order->id }}</p>
                        <p><b>Total: </b>{{ number_format($total, 0, ',' , '.') }} VND</p>
                        <p><b>Name: </b>{{ $order->name }}</p>
                        <p><b>Email: </b>{{ $order->email }}</p>
                        <p><b>Phone: </b>{{ $order->phone }}</p>
                        <p><b>Address: </b>{{ $order->address }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('cart/cart.js') }}"></script>
@endsection

