@extends('admin.layout.master')
@section('content-title','Cập nhật trạng thái đơn hàng')
@section('page-name','Cập nhật trạng thái đơn hàng')
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('orders.update', ['order'=>$order->id]) }}" class="form-horizontal form-material mx-2">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Chờ xác nhận</option>
                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đã xác nhận</option>
                    <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đang chuẩn bị</option>
                    <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Đang giao</option>
                    <option value="5" {{ $order->status == 5 ? 'selected' : '' }}>Đã giao</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white">update</button>
                <a href="{{ route('orders.list') }}" class="btn btn-danger text-white">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection