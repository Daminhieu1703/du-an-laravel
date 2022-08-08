@extends('admin.layout.master')
@section('content-title',isset($sector) ? 'Cập nhật loại hàng' : 'Thêm mới loại hàng')
@section('page-name',isset($sector) ? 'Cập nhật loại hàng' : 'Thêm mới loại hàng')
@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                Vui lòng kiểm tra lại dữ liệu nhập vào form
            </div>
        @endif
        <form method="POST" action="{{isset($sector) ? route('sectors.update', ['sector'=>$sector->id]) : route('sectors.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
            @csrf
            @if (isset($sector))
                @method('PUT')
            @endif
            <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="Mời bạn nhập tên loại hàng" class="form-control form-control-line" name="name" value="{{isset($sector) ? $sector->name : old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white">{{isset($sector) ? 'Update' : 'Create'}}</button>
                <a href="{{ route('sectors.list') }}" class="btn btn-danger text-white">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection