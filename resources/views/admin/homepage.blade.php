@extends('admin.layout.master')
@section('content-title','Quản lý')
@section('page-name','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Tìm kiếm đơn hàng</h4>
                            <h5 class="card-subtitle">Tìm kiếm đơn hàng theo dữ liệu điền vào</h5>
                        </div>
                        <div class="dl ms-auto">
                            <input type="text" class="form-control form-control-line" id="myInput" placeholder="Điền đơn hàng cần tìm">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover align-middle text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Mã đơn hàng</th>
                                    <th class="border-top-0">Số lượng sản phẩm</th>
                                    <th class="border-top-0">Tổng tiền đơn hàng</th>
                                    <th class="border-top-0">Tên khách hàng</th>
                                    <th class="border-top-0">Số liên lạc</th>
                                    <th class="border-top-0">Trạng thái</th>
                                    <th class="border-top-0">Ngày đặt</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($order_list as $item)
                                    <tr>
                                        <td><h4 class="m-b-0 font-16">#{{$item->id}}</h4></td>
                                        <td>{{$item->amount}} sản phẩm</td>
                                        <td>{{number_format($item->total,0,',','.')}}đ</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>@if ($item->status == 1)
                                            Chờ xác nhận
                                        @elseif($item->status == 2)
                                            Đã xác nhận
                                        @elseif($item->status == 3)
                                            Đang chuẩn bị
                                        @elseif($item->status == 4)
                                            Đang giao
                                        @elseif($item->status == 5)
                                            Đã giao
                                        @elseif($item->status == 6)
                                            Đã nhận hàng
                                        @endif</td>
                                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông số</h4>
                    <h6 class="card-subtitle">Thống kê  mục của shop</h6>
                    <div class="mt-5 pb-3 d-flex align-items-center">
                        <span class="btn btn-primary btn-circle d-flex align-items-center">
                            <i class="fas fa-list fs-4" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Loại hàng</h5>
                            <span class="text-muted fs-6">Tất cả loại hàng</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                @if ($sectors == 0)
                                    chưa có loại hàng
                                @else
                                    {{$sectors}} loại hàng 
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-warning btn-circle d-flex align-items-center">
                            <i class="fa-solid fa-shapes fs-4" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Sản phẩm</h5>
                            <span class="text-muted fs-6">Tất cả sản phẩm</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                @if ($products == 0)
                                chưa có sản phẩm
                                @else
                                    {{$products}} sản phẩm 
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-success btn-circle d-flex align-items-center">
                            <i class="mdi mdi-comment-multiple-outline text-white fs-4" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Bình luận</h5>
                            <span class="text-muted fs-6">Tất cả bình luận</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                @if ($comments == 0)
                                chưa có bình luận
                                @else
                                    {{$comments}} bình luận 
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-info btn-circle d-flex align-items-center">
                            <i class="fa-solid fa-users fs-4 text-white" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Tài khoản</h5>
                            <span class="text-muted fs-6">Tất cả người dùng</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                @if ($users == 0)
                                chưa có tài khoản nào
                                @else
                                    {{$users}} tài khoản 
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="pt-3 d-flex align-items-center">
                        <span class="btn btn-danger btn-circle d-flex align-items-center">
                            <i class="fa-solid fa-cart-flatbed fs-4 text-white" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Đơn hàng</h5>
                            <span class="text-muted fs-6">Tất cả đơn hàng</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                @if ($orders == 0)
                                    chưa có đơn hàng nào
                                @else
                                    {{$orders}} đơn hàng 
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection