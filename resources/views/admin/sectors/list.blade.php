@extends('admin.layout.master')
@section('content-title','Quản lý loại hàng')
@section('page-name','Loại hàng')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-md-flex m-3">
                    <h4 class="card-title">Danh sách Loại hàng</h4>
                    <div class="ms-auto">
                        <div class="dl">
                            <a class="btn btn-success text-white" href="{{ route('sectors.create') }}">Add new</a>
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
                        <form action="{{ route('sectors.delete-all') }}" method="POST">
                            <table class="table table-bordered table-responsive-lg">
                                    @csrf
                                    @method('delete')
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" id="checkAl"></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sectors as $sector)
                                            <tr>
                                                <td><input type="checkbox" value="{{$sector->id}}" name="id[{{$sector->id}}]" id="checkItem"></td>
                                                <th scope="row">{{$sector->id}}</th>
                                                <td>{{$sector->name}}</td>
                                                <td><a href="{{ route('sectors.edit',['sector' => $sector->id]) }}" class="btn btn-secondary">Edit</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                <div class="float-end">{{ $sectors->links() }}</div>
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
@endsection