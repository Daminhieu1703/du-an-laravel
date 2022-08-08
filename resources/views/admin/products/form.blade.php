@extends('admin.layout.master')
@section('content-title',isset($product) ? 'Cập nhật sản phẩm' : 'Thêm mới sản phẩm')
@section('page-name',isset($product) ? 'Cập nhật sản phẩm' : 'Thêm mới sản phẩm')
@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                Vui lòng kiểm tra lại dữ liệu nhập vào form
            </div>
        @endif
        <form method="POST" action="{{isset($product) ? route('products.update', ['product'=>$product->id]) : route('products.store') }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" placeholder="Mời bạn nhập tên sản phẩm" class="form-control form-control-line" name="name" value="{{isset($product) ? $product->name : old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Img</label>
                            <div class="row">
                                <div class="col">
                                    <input type="file" class="form-control form-control-line" name="{{isset($product) ? 'img_new' : 'img'}}">
                                </div>
                                @if (isset($product))
                                    <div class="col-2">
                                        <input type="hidden" value="{{isset($product) ? $product->img : old('img')}}" name="img">
                                        <img src="{{ asset($product->img) }}" alt="" width="100px">
                                    </div>
                                @endif
                            </div>
                        @error('img')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" placeholder="Mời bạn nhập giá sản phẩm" class="form-control form-control-line" name="price" value="{{isset($product) ? $product->price : old('price')}}">
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label >Amount</label>
                        <input type="text" placeholder="Mời bạn nhập số lượng" class="form-control form-control-line" name="amount" value="{{isset($product) ? $product->amount : old('amount')}}">
                        @error('amount')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                    <textarea placeholder="Mời bạn nhập mô tả" class="form-control form-control-line" name="description" rows="5">{{isset($product) ? $product->description : old('description')}}</textarea>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Height</label>
                        <input type="text" placeholder="Mời bạn nhập chiều dài" class="form-control form-control-line" name="height" value="{{isset($product) ? $product->height : old('height')}}">
                        @error('height')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Width</label>
                        <input type="text" placeholder="Mời bạn nhập chiều rộng" class="form-control form-control-line" name="width" value="{{isset($product) ? $product->width : old('width')}}">
                        @error('width')
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
                            @if (isset($product))
                            <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Còn hàng</option>
                            <option value="2" {{$product->status == 2 ? 'selected' : ''}}>Hết hàng</option>
                            @else
                                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Còn hàng</option>
                                <option value="2" {{old('status') == 2 ? 'selected' : ''}}>Hết hàng</option>
                            @endif
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Size</label>
                        <select class="form-select shadow-none form-control-line" name="size_id">
                            <option @selected(true) @disabled(true)>Mời bạn chọn kích thước giường</option>
                            @foreach ($sizes as $size)
                                @if (isset($product))
                                    <option value="{{$size->id}}" {{$product->sector_id == $size->id ? 'selected' : ''}}>{{$size->name}}</option>
                                @else
                                    <option value="{{$size->id}}" {{old('size_id') == $size->id ? 'selected' : ''}}>{{$size->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Sector</label>
                        <select class="form-select shadow-none form-control-line" name="sector_id">
                            <option @selected(true) @disabled(true)>Mời bạn chọn loại hàng</option>
                            @foreach ($sectors as $sector)
                                @if (isset($product))
                                    <option value="{{$sector->id}}" {{$product->sector_id == $sector->id ? 'selected' : ''}}>{{$sector->name}}</option>
                                @else
                                    <option value="{{$sector->id}}" {{old('sector_id') == $sector->id ? 'selected' : ''}}>{{$sector->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('sector_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white">{{isset($product) ? 'Update' : 'Create'}}</button>
                <a href="{{ route('products.list') }}" class="btn btn-danger text-white">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection