@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('chekout/login.css') }}">
@endsection

@section('content')
<!--form-->
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <!--login form-->
                <div class="login-form">
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{ route('loginCustomer') }}" method="post">
                        @csrf
                        <input type="email" 
                                name="email_account" 
                                class="@error('email_account') is-invalid @enderror" 
                                placeholder="Email"
                                value="{{ old('email_account') }}"
                        >
                        @error('email_account')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="password" 
                                name="password_account"
                                class="@error('password_account') is-invalid @enderror"
                                value="{{ old('password_account') }}"
                                placeholder="Password"
                        >
                        @error('password_account')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Ghi nhớ đăng nhập
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <!--sign up form-->
                <div class="signup-form">
                    <h2>Đăng ký</h2>
                    <form action="{{ route('addCustomer') }}" method="post">
                        @csrf
                        <input type="text" 
                                name="name" 
                                class="@error('name') is-invalid @enderror"
                                placeholder="Nhập họ tên"
                                value="{{ old('name') }}"
                        >
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="email" 
                                name="email" 
                                class="@error('email') is-invalid @enderror"
                                placeholder="Nhập email"
                                value="{{ old('email') }}"
                        >
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="password" 
                                name="password" 
                                class="@error('password') is-invalid @enderror"
                                placeholder="Nhập mật khẩu"
                                value="{{ old('password') }}"
                        >
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="text" 
                                name="phone" 
                                class="@error('phone') is-invalid @enderror"
                                placeholder="Nhập SDT"
                                value="{{ old('phone') }}"
                        >
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
@endsection