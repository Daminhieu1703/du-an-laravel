@extends('admin.layout.master')
@section('content-title','Quản lý sản phẩm')
@section('page-name','Sản phẩm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex mb-3">
                        <h4 class="card-title">Danh sách sản phẩm</h4>
                        <div class="ms-auto">
                            <div class="dl">
                                <a class="btn btn-success text-white" href="{{ route('products.create') }}">Add new</a>
                            </div>
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
                        <form action="{{ route('products.delete-all') }}" method="POST">
                            <table class="table table-bordered mb-0 table-hover align-middle text-nowrap mb-3">
                                    @csrf
                                    @method('delete')
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" id="checkAl"></th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Chức năng</th>
                                            <th scope="col">Bình luận</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">số lượng</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Chiều cao</th>
                                            <th scope="col">Chiều rộng</th>
                                            <th scope="col">Kích cỡ</th>
                                            <th scope="col">Loại hàng</th>
                                            <th scope="col">Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><input type="checkbox" value="{{$product->id}}" name="id[{{$product->id}}]" id="checkItem"></td>
                                                <td>@if ($product->status == 2)
                                                    <a href="{{ route('products.change-status', ['product'=>$product->id]) }}" class="btn btn-warning">Khóa</a>
                                                @else
                                                    <a href="{{ route('products.change-status', ['product'=>$product->id]) }}" class="btn btn-info text-white">Mở</a>
                                                @endif</td>
                                                <td><a class="btn btn-secondary text-white" href="{{ route('products.edit', ['product'=>$product->id]) }}">Edit</a></td>
                                                <td><a class="btn btn-primary" href="{{ route('routeName', ['id'=>1]) }}">Bình luận</a></td>
                                                <td scope="row">{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->amount}}</td>
                                                <td><img src="{{asset($product->img)}}" alt="" width="50px"></td>
                                                <td>{{$product->height}}</td>
                                                <td>{{$product->width}}</td>
                                                <td>{{$product->size->name}}</td>
                                                <td>{{$product->sector->name}}</td>
                                                <td>{{$product->description}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                <div class="float-end">{{ $products->links() }}</div>
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
    </div>
@endsection