@extends('admin.layout.master')
@section('content-title',isset($user) ? 'Cập nhật tài khoản' : 'Thêm mới tài khoản')
@section('page-name',isset($user) ? 'Cập nhật tài khoản' : 'Thêm mới tài khoản')
@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                Vui lòng kiểm tra lại dữ liệu nhập vào form
            </div>
        @endif
        <form method="POST" action="{{isset($user) ? route('users.update', ['user'=>$user->id]) : route('users.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" placeholder="Mời bạn nhập họ tên" class="form-control form-control-line" name="name" value="{{isset($user) ? $user->name : old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Mời bạn nhập tên tài khoản" class="form-control form-control-line" name="username" value="{{isset($user) ? $user->username : old('username')}}">
                        @error('username')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" placeholder="Mời bạn nhập email" class="form-control form-control-line" name="email" value="{{isset($user) ? $user->email : old('email')}}">
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
                        <input type="date" class="form-control form-control-line" name="birthday" value="{{isset($user) ? $user->birthday : old('birthday')}}">
                        @error('birthday')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Avatar</label>
                            <div class="row">
                                <div class="col">
                                    <input type="file" class="form-control form-control-line" name="{{isset($user) ? 'avatar_new' : 'avatar'}}">
                                </div>
                                @if (isset($user))
                                    <div class="col-2">
                                        <input type="hidden" value="{{isset($user) ? $user->avatar : old('avatar')}}" name="avatar">
                                        <img src="{{ asset($user->avatar) }}" alt="" width="100px">
                                    </div>
                                @endif
                            </div>
                        @error('avatar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                    <textarea placeholder="Mời bạn nhập địa chỉ" class="form-control form-control-line" name="address" rows="5">{{isset($user) ? $user->address : old('address')}}</textarea>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" placeholder="Mời bạn nhập số điện thoại" class="form-control form-control-line" name="phone" value="{{isset($user) ? $user->phone : old('phone')}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" placeholder="Mời bạn nhập password" class="form-control form-control-line" name="password" value="{{isset($user) ? $user->password : old('password')}}">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>password confirm</label>
                        <input type="password" placeholder="Mời bạn nhập password" class="form-control form-control-line" name="password_confirm" value="{{isset($user) ? $user->password : old('password')}}">
                        @error('password_confirm')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select shadow-none form-control-line" name="status">
                            <option @selected(true) @disabled(true)>Mời bạn chọn trạng thái</option>
                            @if (isset($user))
                            <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Kích hoạt</option>
                            <option value="2" {{$user->status == 2 ? 'selected' : ''}}>Không kích hoạt</option>
                            @else
                                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Kích hoạt</option>
                                <option value="2" {{old('status') == 2 ? 'selected' : ''}}>Không kích hoạt</option>
                            @endif
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select shadow-none form-control-line" name="gender">
                            <option @selected(true) @disabled(true)>Mời bạn chọn giới tính</option>
                            @if (isset($user))
                            <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Nam</option>
                            <option value="2" {{$user->gender == 2 ? 'selected' : ''}}>Nữ</option>
                            @else
                                <option value="1" {{old('gender') == 1 ? 'selected' : ''}}>Nam</option>
                                <option value="2" {{old('gender') == 2 ? 'selected' : ''}}>Nữ</option>
                            @endif
                        </select>
                        @error('gender')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-select shadow-none form-control-line" name="role">
                            <option @selected(true) @disabled(true)>Mời bạn chọn chức vụ</option>
                            @if (isset($user))
                            <option value="1" {{$user->role == 1 ? 'selected' : ''}}>Khách hàng</option>
                            <option value="2" {{$user->role == 2 ? 'selected' : ''}}>Quản trị</option>
                            @else
                                <option value="1" {{old('role') == 1 ? 'selected' : ''}}>Khách hàng</option>
                                <option value="2" {{old('role') == 2 ? 'selected' : ''}}>Quản trị</option>
                            @endif
                        </select>
                        @error('role')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white">{{isset($user) ? 'Update' : 'Create'}}</button>
                <a href="{{ route('users.list') }}" class="btn btn-danger text-white">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection