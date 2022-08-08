@extends('admin.layout.master')
@section('content-title',isset($size) ? 'Cập nhật kích cỡ' : 'Thêm mới kích cỡ')
@section('page-name',isset($size) ? 'Cập nhật kích cỡ' : 'Thêm mới kích cỡ')
@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                Vui lòng kiểm tra lại dữ liệu nhập vào form
            </div>
        @endif
        <form method="POST" action="{{isset($size) ? route('sizes.update', ['size'=>$size->id]) : route('sizes.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
            @csrf
            @if (isset($size))
                @method('PUT')
            @endif
            <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="Mời bạn nhập tên kích cỡ" class="form-control form-control-line" name="name" value="{{isset($size) ? $size->name : old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white">{{isset($size) ? 'Update' : 'Create'}}</button>
                <a href="{{ route('sizes.list') }}" class="btn btn-danger text-white">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection