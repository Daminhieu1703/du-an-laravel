@extends('client.form.master')
@section('content-title','Đăng nhập')
@section('content')
    <div class="container">
        @if (Session::has('error_correct'))
        <div class="alert alert-success">
            {{ Session::get('error_correct') }}
        </div>
        @elseif(Session::has('error_incorrect'))
            <div class="alert alert-warning">
                {{ Session::get('error_incorrect') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-2">
                <a href="{{ route('client.home') }}" class="float-start backPage">Quay về</a>
            </div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key"><i class="fa-solid fa-lock" aria-hidden="true"></i></div>
                <div class="col-lg-12 login-title">ĐĂNG NHẬP</div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="post" action="{{ route('form.postLogin') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-5 login-btm login-button">
                                    <button type="submit">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Đăng nhập
                                    </button>
                                </div>
                                <div class="col-lg-7 login-btm login-text">
                                    <a href="{{ route('form.getRegister') }}" class="backPage">Bạn chưa có tài khoản ?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
@endsection
