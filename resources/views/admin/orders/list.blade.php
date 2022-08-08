@extends('admin.layout.master')
@section('content-title','Quản lý đơn hàng')
@section('page-name','đơn hàng')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-md-flex m-3">
                    <h4 class="card-title">Danh sách đơn hàng</h4>
                </div>
                <div class="table-responsive m-3">
                    @if (Session::has('error_correct'))
                        <div class="alert alert-success">
                            {{ Session::get('error_correct') }}
                        </div>
                    @endif
                        <form action="{{ route('orders.cancelAll') }}" method="POST">
                                <table class="table table-bordered table-responsive-lg">
                                    @csrf
                                    @method('delete')
                                    <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" id="checkAl"></th>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Mã khách hàng</th>
                                            <th scope="col">Họ và tên</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col" colspan="2">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td><input type="checkbox" value="{{$order->id}}" name="id[{{$order->id}}]" id="checkItem"></td>
                                                <td scope="row">#{{$order->id}}</td>
                                                <td>#{{$order->user_id}}</td>
                                                <td>{{$order->name}}</td>
                                                <td>{{$order->phone}}</td>
                                                <td>{{$order->amount}}</td>
                                                <td>{{number_format($order->total,0,',','.')}}đ</td>
                                                <td>@if ($order->status == 1)
                                                    Chờ xác nhận
                                                @elseif($order->status == 2)
                                                    Đã xác nhận
                                                @elseif($order->status == 3)
                                                    Đang chuẩn bị
                                                @elseif($order->status == 4)
                                                    Đang giao
                                                @elseif($order->status == 5)
                                                    Đã giao
                                                @elseif($order->status == 6)
                                                    Đã nhận hàng
                                                @endif</td>
                                                <td scope="col">
                                                    @if ($order->status != 6)
                                                    <a class="btn btn-secondary text-white" href="{{ route('orders.edit', ['order'=>$order->id]) }}">Cập nhật trạng thái</a>
                                                    @endif
                                                    <a class="btn btn-success text-white" href="{{ route('orders.detail', ['order'=>$order->id]) }}">Chi tiết</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Hủy đơn hàng</button>
                                <div class="float-end">{{ $orders->links() }}</div>
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