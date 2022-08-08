@extends('client.form.master')
@section('content-title','Đăng ký')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-2">
            <a href="{{ route('client.home') }}" class="float-start backPage">Quay về</a>
        </div>
        <div class="col-lg-10 col-md-8 login-box">
            <div class="col-lg-12 login-key"><i class="fa-solid fa-key" aria-hidden="true"></i></div>
            <div class="col-lg-12 login-title">ĐĂNG KÝ</div>
            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form action="{{ route('form.postRegister') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">HỌ VÀ TÊN</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">EMAIL</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">ĐỊA CHỈ</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">USERNAME</label>
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                    @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">SỐ ĐIỆN THOẠI</label>
                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">NGÀY SINH</label>
                                    <input type="date" class="form-control" name="birthday" value="{{old('birthday')}}">
                                    @error('birthday')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">GIỚI TÍNH</label>
                                    <select name="gender" id="select" class="form-control">
                                        <option @selected(true) @disabled(true)>MỜI BẠN CHỌN GIỚI TÍNH</option>
                                        <option value="1" {{old('gender') == 1 ? 'selected' : ''}}>NAM</option>
                                        <option value="2" {{old('gender') == 2 ? 'selected' : ''}}>NỮ</option>
                                    </select>
                                    @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">AVATAR</label>
                                    <input type="file" class="form-control" name="avatar">
                                    @error('avatar')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">MẬT KHẨU</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">XÁC NHẬN LẠI MẬT KHẨU</label>
                                    <input type="password" class="form-control" name="password_confirm">
                                    @error('password_confirm')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="role" value="1">
                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    Đăng ký
                                </button>
                            </div>
                            <div class="col-lg-6 login-btm login-text">
                                <a href="{{ route('form.getLogin') }}" class="backPage">Bạn đã có tài khoản ?</a>
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