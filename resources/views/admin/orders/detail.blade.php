@extends('admin.layout.master')
@section('content-title','Quản lý đơn hàng')
@section('page-name','chi tiết đơn đơn hàng')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-md-flex m-3">
                    <h4 class="card-title">Chi tiết đơn hàng #{{$order->id}}</h4>
                </div>
                <div class="table-responsive m-3">
                        <hr>
                        <h4 class="text-center">Thông tin cá nhân của khách hàng</h4>
                        <p>Họ và tên: <strong>{{$user->name}}</strong></p>
                        <p>Tên tài khoản: <strong>{{$user->username}}</strong></p>
                        <p>Số điện thoại: <strong>{{$user->phone}}</strong></p>
                        <p>Email: <strong>{{$user->email}}</strong></p>
                        <p>Địa chỉ: <strong>{{$user->address}}</strong></p>
                        @if (empty($user->note) == false)
                            <p>Ghi chú: <strong>{{$user->note}}</strong></p>
                        @endif
                        <hr>
                        <h4 class="text-center">Sản phẩm trong đơn hàng</h4>
                    <table class="table table-bordered table-responsive-lg">
                        <thead>
                            <tr>
                                <th scope="col">Loại hàng</th>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Kích cỡ</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $orderDetail)
                                <tr>
                                    <td>{{$orderDetail->sector}}</td>
                                    <td>{{$orderDetail->product_id}}</td>
                                    <td>{{$orderDetail->name}}</td>
                                    <td><img src="{{ asset($orderDetail->img) }}" alt="" width="100px"></td>
                                    <td>{{$orderDetail->size}}</td>
                                    <td>{{$orderDetail->amount}}</td>
                                    <td>{{number_format($orderDetail->price,0,',','.')}}đ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><h4>Tổng tiền đơn hàng</h4></td>
                                <td colspan="2" class="text-center"><h4>{{number_format($totals,0,',','.')}}đ</h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection