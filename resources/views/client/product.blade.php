@extends('client.layout.master')
@section('content-title','Chi tiết sản phẩm')
@section('content')
<section class="product-page" data-aos="zoom-in">
    <div class="container pb-5">
        <div class="row">
            @if (Session::has('error_correct'))
                <div class="alert alert-success">
                    {{ Session::get('error_correct') }}
                </div>
            @elseif(Session::has('error_incorrect'))
                <div class="alert alert-warning">
                    {{ Session::get('error_incorrect') }}
                </div>
            @endif
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset($product->img) }}" alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body shadow-body">
                        <h1 class="h2">{{$product->name}}</h1>
                        <div class="d-flex py-2">
                            <p class="h3 me-1">{{number_format($product->price,0,',','.')}}đ</p>
                        </div>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Loại:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{$product->sector->name}}</strong></p>
                            </li>
                        </ul>
                        @if ($product->amount > 0 && $product->status == 1)
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Số lượng:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$product->amount}}</strong></p>
                                </li>
                            </ul>
                        @else
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6 class="bg-danger rounded text-white py-1 px-3">Sản phẩm này đã hết hàng</h6>
                            </li>
                        </ul>
                        @endif
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Mô tả:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{$product->description}}</strong></p>
                            </li>
                        </ul>
                        <h6>Số đo:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Chiều rộng: {{$product->width}}cm</li>
                            <li>Chiều rộng: {{$product->height}}cm</li>
                        </ul>

                        <form action="{{ route('client.postCart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product-title" value="Activewear">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size:
                                            <input type="hidden" name="product-size" id="product-size" value="S">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-dark btn-size">{{$product->size->name}}</span></li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <div class="d-flex mb-4" style="max-width: 300px">
                                        <a class="btn btn-dark px-3 me-2"
                                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                          <i class="fas fa-minus"></i>
                                        </a>
                      
                                        <div class="form-outline">
                                          <input id="form1" min="0" name="amount" value="1" type="number" class="form-control" />
                                        </div>
                      
                                        <a class="btn btn-dark px-3 ms-2"
                                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                          <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button  type="submit"{{$product->amount > 0 && $product->status == 1 ? '': 'disabled'}} class="btn btn-dark btn-lg" name="submit" value="addtocard">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Testimonial Start -->
    <div class="container-fluid bg-white bg-icon mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Sản phẩm cùng loại</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($productWithSector as $item)
                    <div class="testimonial-item position-relative bg-white p-5 mt-4">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset($item->img) }}" alt="">
                                <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="">{{$item->name}}</a>
                                <span class="text-dark me-1">{{number_format($item->price,0,',','.')}}đ</span>
                            </div>
                            <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body" href=""><i class="fa fa-eye text-dark me-2"></i>Xem chi tiết</a>
                                </small>
                                <small class="w-50 text-center py-2">
                                    <a class="text-body" href=""><i class="fa fa-shopping-bag text-dark me-2"></i>Thêm vào giỏ</a>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <section style="cmt-page">
        <div class="mb-5">
          <div class=" d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-11">
              <div class="card">
                @if ($cmt->IsEmpty())
                    <h4 class="text-center m-5">Bạn hãy là người đầu tiên bình luận về sản phẩm này</h4>
                @else
                    @foreach ($cmt as $item)
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3"
                                src="{{ asset($item->avatar) }}" alt="avatar" width="30"
                                height="30" />
                            <div>
                                <h6 class="fw-bold text-dark">{{$item->name}}</h6>
                                <p class="text-muted small mb-0">
                                {{$item->created_at}}
                                </p>
                            </div>
                            </div>
                
                            <p class="mb-4 pb-2">{{$item->content}}</p>
                
                            <div class="small d-flex justify-content-start">
                            <a href="#!" class="d-flex align-items-center me-3 text-dark">
                                <i class="far fa-thumbs-up me-2"></i>
                                <p class="mb-0">Thích</p>
                            </a>
                            <a href="#!" class="d-flex align-items-center me-3 text-dark">
                                <i class="far fa-comment-dots me-2"></i>
                                <p class="mb-0">Trả lời</p>
                            </a>
                            <a href="#!" class="d-flex align-items-center me-3 text-dark">
                                <i class="fas fa-share me-2"></i>
                                <p class="mb-0">Chia sẻ</p>
                            </a>
                            </div>
                        </div>
                    @endforeach
                @endif
                    @if (Auth::check())
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                            <form action="{{ route('client.postComment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="{{ asset(Auth::user()->avatar) }}" alt="avatar" width="40"
                                    height="40" />
                                <div class="form-floating w-100">
                                    <textarea class="form-control" id="textAreaExample" rows="4"
                                    style="background: #fff;" name="content"></textarea>
                                    <label class="form-label" for="textAreaExample">Message</label>
                                </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                <button type="submit" id="btn-comment" class="btn btn-dark btn-sm">Bình luận</button>
                                <button type="button" class="btn btn-outline-danger btn-sm">Hủy</button>
                                </div>
                            </form>
                        </div>
                    @endif
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection