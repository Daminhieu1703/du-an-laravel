@extends('client.layout.master')
@section('content-title','Cửa hàng')
@section('content')
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s"></div>

<main class="cd-main-content">
    <div class="cd-tab-filter-wrapper"></div>

    <section class="cd-gallery">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4 checkEmpty">
                @if (isset($filter_products))
                    @foreach ($filter_products as $product)
                        @foreach ($product as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <a href="{{ route('client.product', ['product'=>$item->id]) }}">
                                            <img class="img-fluid w-100" src="{{ asset($item->img) }}" alt="">
                                        </a>
                                        <div class="{{$item->amount > 0 && $item->status == 1 ? 'bg-success' : 'bg-danger'}} rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$product->amount > 0 && $product->status == 1 ? 'Còn hàng' : 'Hết hàng'}}</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{$item->name}}</a>
                                        <span class="text-dark me-1">{{number_format($item->price,0,',','.')}}đ</span>
                                    </div>
                                    <div class="border-top">
                                        <p class="py-1 text-center"><i class="fa fa-eye text-dark me-2"></i>{{$item->view}} lượt xem</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @else
                    @foreach ($products as $product)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <a href="{{ route('client.product', ['product'=>$product->id]) }}">
                                            <img class="img-fluid w-100" src="{{ asset($product->img) }}" alt="">
                                        </a>
                                        <div class="{{$product->amount > 0 && $product->status == 1 ? 'bg-success' : 'bg-danger'}} rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$product->amount > 0 && $product->status == 1 ? 'Còn hàng' : 'Hết hàng'}}</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{$product->name}}</a>
                                        <span class="text-dark me-1">{{number_format($product->price,0,',','.')}}đ</span>
                                    </div>
                                    <div class="border-top">
                                        <p class="py-1 text-center"><i class="fa fa-eye text-dark me-2"></i>{{$product->view}} lượt xem</p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section> <!-- cd-gallery -->
    <div class="cd-filter">
        <form action="{{ route('client.filter') }}" method="post">
            @csrf
            <div class="cd-filter-block">
                <h4>Danh mục sản phẩm</h4>
                <ul class="cd-filter-content cd-filters list">
                    {{-- <li>
                        <input class="filter" type="radio" name="sector_id" id="radio">
                        <label class="radio-label" for="radio">All</label>
                    </li> --}}
                    @foreach ($sectors as $sector)
                        <li>
                            <input class="filter" type="radio" name="sector_id" value="{{$sector->id}}" id="radio">
                            <label class="radio-label" for="radio">{{$sector->name}}</label>
                        </li>
                    @endforeach
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->
            <div class="cd-filter-block">
                <h4>Kích cỡ</h4>
                <ul class="cd-filter-content cd-filters list">
                    @foreach ($sizes as $size)
                        <li>
                            <input class="filter" type="checkbox" id="checkbox" name="size_id[{{$size->id}}]" value="{{$size->id}}">
                            <label class="checkbox-label" for="checkbox">{{$size->name}}</label>
                        </li>
                    @endforeach
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->
            <div class="cd-filter-block">
                <button type="submit" class="btn btn-success">tìm kếm</button>
            </div>

        </form>

        <a href="#0" class="cd-close">Đóng</a>
    </div> <!-- cd-filter -->

    <a href="#0" class="cd-filter-trigger">Bộ lọc</a>
</main> <!-- cd-main-content -->
@endsection