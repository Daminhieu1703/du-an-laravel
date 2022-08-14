@extends('admin.layout.master')
@section('content-title','Chỉnh sửa')
@section('page-name','Chỉnh sửa tài khoản')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
      <hr>
    <form class="form-horizontal" role="form" action="{{ route('users.updateAdmin', ['user'=>$user->id]) }}" method="post" enctype="multipart/form-data">
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="{{ asset($user->avatar) }}" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Tải ảnh khác lên...</h6>
          <input type="hidden" value="{{$user->avatar}}" name="avatar">
          <input type="file" class="form-control" name="avatar_new">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-coffee"></i>
            <strong>Lỗi thông tin</strong>. Mời bạn kiểm tra lại thông tin.
            </div>
        @endif
        @if (Session::has('error_correct'))
        <div class="alert alert-success">
            {{ Session::get('error_correct') }}
        </div>
        @endif
        <h3>Thông tin cá nhân</h3>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" placeholder="Mời bạn nhập họ tên" class="form-control form-control-line" name="name" value="{{$user->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Mời bạn nhập tên tài khoản" class="form-control form-control-line" name="username" value="{{$user->username}}">
                        @error('username')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" placeholder="Mời bạn nhập email" class="form-control form-control-line" name="email" value="{{$user->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label >Birthday</label>
                        <input type="date" class="form-control form-control-line" name="birthday" value="{{$user->birthday}}">
                        @error('birthday')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select shadow-none form-control-line" name="gender">
                            <option @selected(true) @disabled(true)>Mời bạn chọn giới tính</option>
                            <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Nam</option>
                            <option value="2" {{$user->gender == 2 ? 'selected' : ''}}>Nữ</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                    <textarea placeholder="Mời bạn nhập địa chỉ" class="form-control form-control-line" name="address" rows="5">{{$user->address}}</textarea>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" placeholder="Mời bạn nhập số điện thoại" class="form-control form-control-line" name="phone" value="{{$user->phone}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" placeholder="Mời bạn nhập password" class="form-control form-control-line" name="password" value="{{$user->password}}">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" value="{{$user->status}}" name="status">
                <input type="hidden" value="{{$user->role}}" name="role">
                <div class="col">
                    <div class="form-group">
                        <label>password confirm</label>
                        <input type="password" placeholder="Mời bạn nhập password" class="form-control form-control-line" name="password_confirm" value="{{$user->password}}">
                        @error('password_confirm')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white">Cập nhật</button>
            </div>
      </div>
  </div>
</form>
</div>
<hr>
@endsection