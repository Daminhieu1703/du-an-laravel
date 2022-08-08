@extends('client.layout.master')
@section('content-tittle','Giỏ hàng')
@section('content')
<section class="h-100 gradient-custom">
    <div class="container py-5">
      @if (Auth::check())
        @if ($carts->isEmpty())
          <div class="row d-flex justify-content-center my-4">
            <img style="width: 30rem;" src="{{ asset('assets/client/img/empty_cart.webp') }}" alt="">
          </div>
        @else
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
              <div class="card mb-4 shadow-product">
                <div class="card-header py-3 bg-dark text-white">
                  <h5 class="mb-0">Giỏ hàng</h5>
                </div>
                <div class="card-body">
                  @foreach ($carts as $cart)
                    <div class="row">
                      <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                          <img src="{{ asset($cart->img) }}" class="w-100" alt="" />
                        </div>
                        <!-- Image -->
                      </div>
        
                      <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                        <!-- Data -->
                        <p><strong>{{$cart->name}}</strong></p>
                        <p>Loại hàng: {{$cart->sector}}</p>
                        <p>Size: {{$cart->size}}</p>
                        <a href="{{ route('client.deleteCart', ['cart'=>$cart->id]) }}" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                          title="Remove item">
                          <i class="fas fa-trash"></i>
                        </a>
                        <button type="button" class="btn btn-warning btn-sm mb-2" data-mdb-toggle="tooltip"
                          title="Move to the wish list">
                          <i class="fas fa-heart"></i>
                        </button>
                        <!-- Data -->
                      </div>
                      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                        <!-- Quantity -->
                        <div class="d-flex mb-4" style="max-width: 300px">
                          <button class="btn btn-dark px-3 me-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>
        
                          <div class="form-outline">
                            <input id="form1" min="0" name="quantity" value="{{$cart->amount}}" type="number" class="form-control" />
                          </div>
        
                          <button class="btn btn-dark px-3 ms-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <!-- Quantity -->
        
                        <!-- Price -->
                        <p class="text-start text-md-center">
                          <strong>{{number_format($cart->price,0,',','.')}}đ</strong>
                        </p>
                        <!-- Price -->
                      </div>
                    </div>
                    <!-- Single item -->
        
                    <hr class="my-4" />
                  @endforeach
                  <div class=" py-3 bg-white text-dark">
                    <h5 class="mb-0">Tổng tiền: {{number_format($total_cart,0,',','.')}}đ</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-checkout">
                <div class="card-header py-3 bg-dark text-white">
                  <h5 class="mb-0">Thanh toán</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.postOrder') }}" method="post">
                        @csrf
                        <input type="hidden" value="1" name="status">
                        <input type="hidden" value="{{$amount_cart}}" name="amount">
                        <input type="hidden" value="{{$total_cart}}" name="total">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-floating">
                              <input type="text" id="form3Example1" class="form-control" value="{{Auth::user()->username}}"/>
                              <label class="form-label" for="form3Example1">Tên đăng nhập</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-floating">
                              <input type="text" id="form3Example2" class="form-control" value="{{Auth::user()->name}}"/>
                              <label class="form-label" for="form3Example2">Họ và tên</label>
                            </div>
                          </div>
                        </div>
                      
                        <!-- Email input -->
                        <div class="form-floating mb-4">
                          <input type="email" id="form3Example3" class="form-control" value="{{Auth::user()->email}}"/>
                          <label class="form-label" for="form3Example3">Email</label>
                        </div>
                      
                        <!-- Password input -->
                        <div class="form-floating mb-4">
                          <input type="text" id="form3Example4" class="form-control" value="{{Auth::user()->phone}}"/>
                          <label class="form-label" for="form3Example4">Số điện thoại</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" id="form3Example5" class="form-control" value="{{Auth::user()->address}}"/>
                            <label class="form-label" for="form3Example5">Địa chỉ</label>
                          </div>
                        <div class="form-floating mb-4">
                            <textarea id="form3Example6" class="form-control" cols="10" rows="30" name="note"></textarea>
                            <label class="form-label" for="form3Example6">Ghi chú</label>
                          </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-dark btn-block mb-4">Đặt hàng</button>
                        <button type="submit" class="btn btn-outline-dark btn-block mb-4">Chọn thêm sản phẩm khác</button>
                      </form>
                </div>
              </div>
            </div>
          </div>
        @endif
      @else
          <div class="row d-flex justify-content-center my-4">
            <div class="cd-fail-message text-center">😓 Bạn chưa đăng nhập !</div>
            <div class="cd-fail-message text-center">Mời bạn nhấn <a href="{{ route('form.getLogin') }}">vào đây</a> để đăng nhập 😊</div>
            <img style="width: 30rem;" src="{{ asset('assets/client/img/empty_login.png') }}" alt="">
          </div>
      @endif
    </div>
  </section>
@endsection