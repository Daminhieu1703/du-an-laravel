@extends('admin.layout.master')
@section('content-title','Quản lý tài khoản')
@section('page-name','Tài khoản')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Danh sách tài khoản khách hàng</h4>
                            <h5 class="card-subtitle"><input type="text" class="form-control form-control-line" id="myInput" placeholder="Tài khoản cần tìm"></h5>
                        </div>
                        <div class="dl ms-auto">
                            <a class="btn btn-success text-white" href="{{ route('users.create') }}">Add new</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if (Session::has('error_correct'))
                            <div class="alert alert-success">
                                {{ Session::get('error_correct') }}
                            </div>
                        @elseif(Session::has('error_incorrect'))
                            <div class="alert alert-warning">
                                {{ Session::get('error_incorrect') }}
                            </div>
                        @endif
                        <form action="{{ route('users.delete-all') }}" method="POST">
                            @csrf
                            @method('delete')
                            <table class="table table-bordered mb-0 table-hover align-middle text-nowrap mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkAl"></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Birthday</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Function</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($users as $user)
                                        @if ($user->role == 1)
                                            <tr>
                                                <td><input type="checkbox" value="{{$user->id}}" name="id[{{$user->id}}]" id="checkItem"></td>
                                                <th scope="row">{{$user->id}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{date('Y-m-d', strtotime($user->birthday))}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td><img src="{{asset($user->avatar)}}" alt="" width="50px"></td>
                                                <td>{{$user->address}}</td>
                                                <td>@if ($user->status == 2)
                                                    <a href="{{ route('users.change-status', ['user'=>$user->id]) }}" class="btn btn-warning">Khóa</a>
                                                @else
                                                    <a href="{{ route('users.change-status', ['user'=>$user->id]) }}" class="btn btn-info text-white">Kích hoạt</a>
                                                @endif</td>
                                                <td>{{$user->gender == 1 ? 'Nam' : 'Nữ'}}</td>
                                                <td>{{$user->role == 1 ? 'Khách hàng' : 'Quản trị'}}</td>
                                                <td>
                                                    <a class="btn btn-secondary text-white" href="{{ route('users.edit', ['user'=>$user->id]) }}">Edit</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                <div class="float-end">{{ $users->links() }}</div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLabel">Thông báo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa dữ liệu bạn đã chọn không ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Danh sách tài khoản admin</h4>
                            <h5 class="card-subtitle"><input type="text" class="form-control form-control-line" id="myInput" placeholder="Tài khoản cần tìm"></h5>
                        </div>
                        <div class="dl ms-auto">
                            <a class="btn btn-success text-white" href="{{ route('users.create') }}">Add new</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form action="{{ route('users.delete-all') }}" method="POST">
                            <table class="table table-bordered mb-0 table-hover align-middle text-nowrap mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkAl"></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Birthday</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Function</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($users as $user)
                                        @if ($user->role == 1)
                                            <tr>
                                                <td><input type="checkbox" value="{{$user->id}}" name="id[{{$user->id}}]" id="checkItem"></td>
                                                <th scope="row">{{$user->id}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{date('Y-m-d', strtotime($user->birthday))}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td><img src="{{asset($user->avatar)}}" alt="" width="50px"></td>
                                                <td>{{$user->address}}</td>
                                                <td>@if ($user->status == 2)
                                                    <a href="{{ route('users.change-status', ['user'=>$user->id]) }}" class="btn btn-warning">Khóa</a>
                                                @else
                                                    <a href="{{ route('users.change-status', ['user'=>$user->id]) }}" class="btn btn-info text-white">Kích hoạt</a>
                                                @endif</td>
                                                <td>{{$user->gender == 1 ? 'Nam' : 'Nữ'}}</td>
                                                <td>{{$user->role == 1 ? 'Khách hàng' : 'Quản trị'}}</td>
                                                <td>
                                                    <a class="btn btn-secondary text-white" href="{{ route('users.edit', ['user'=>$user->id]) }}">Edit</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                <div class="float-end">{{ $users->links() }}</div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLabel">Thông báo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa dữ liệu bạn đã chọn không ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="d-md-flex m-3">
                    <h4 class="card-title">Danh sách tài khoản</h4>
                    <div class="ms-auto">
                        <div class="dl">
                            <a class="btn btn-success text-white" href="{{ route('users.create') }}">Add new</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive m-3">
                    @if (Session::has('error_correct'))
                        <div class="alert alert-success">
                            {{ Session::get('error_correct') }}
                        </div>
                    @elseif(Session::has('error_incorrect'))
                    <div class="alert alert-warning">
                        {{ Session::get('error_incorrect') }}
                    </div>
                    @endif
                        <form action="{{ route('users.delete-all') }}" method="POST">
                            <table class="table table-bordered table-responsive-lg">
                                    @csrf
                                    @method('delete')
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" id="checkAl"></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Birthday</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><input type="checkbox" value="{{$user->id}}" name="id[{{$user->id}}]" id="checkItem"></td>
                                                <th scope="row">{{$user->id}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{date('Y-m-d', strtotime($user->birthday))}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td><img src="{{asset($user->avatar)}}" alt="" width="50px"></td>
                                                <td>{{$user->address}}</td>
                                                <td>@if ($user->status == 2)
                                                    <a href="{{ route('users.change-status', ['user'=>$user->id]) }}" class="btn btn-warning">Khóa</a>
                                                @else
                                                    <a href="{{ route('users.change-status', ['user'=>$user->id]) }}" class="btn btn-info text-white">Kích hoạt</a>
                                                @endif</td>
                                                <td>{{$user->gender == 1 ? 'Nam' : 'Nữ'}}</td>
                                                <td>{{$user->role == 1 ? 'Khách hàng' : 'Quản trị'}}</td>
                                                <td>
                                                    <a class="btn btn-secondary text-white" href="{{ route('users.edit', ['user'=>$user->id]) }}">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                <div class="float-end">{{ $users->links() }}</div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-danger" id="exampleModalLabel">Thông báo</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      Bạn có chắc chắn muốn xóa dữ liệu bạn đã chọn không ?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                      <button type="submit" class="btn btn-danger text-white">Delete</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form>
                </div>
            </div>
        </div> --}}
    </div>
@endsection