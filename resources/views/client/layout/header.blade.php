 <!-- Spinner Start -->
 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
  <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
      <div class="col-lg-6 px-5 text-start">
          <small><i class="fa fa-map-marker-alt me-2"></i>Tân Minh, Thường Tín, Hà Nội</small>
          <small class="ms-4"><i class="fa fa-envelope me-2"></i>daminhieu1703@gmail.com</small>
      </div>
      <div class="col-lg-6 px-5 text-end">
          <small>Theo dõi chúng tôi:</small>
          <a class="text-body ms-3" href=""><i class="fab fa-facebook"></i></a>
          <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
      </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
      <a href="{{ route('client.home') }}" class="navbar-brand ms-4 ms-lg-0">
          <img class="logo-img" src="{{ asset('assets/client/img/logo.png') }}" alt="">
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('client.home') }}" class="nav-item nav-link active">Trang chủ</a>
                <a href="about.html" class="nav-item nav-link">Về chúng tôi</a>
                <a href="{{ route('client.shop') }}"  class="nav-item nav-link">Cửa hàng</a>
                <a href="{{ asset('/contact') }}" class="nav-item nav-link">Liên hệ với chúng tôi</a>
              @if (Auth::check() && Auth::user()->role == 1)
                <a href="{{ route('client.getOrder') }}" class="nav-item nav-link">Đơn hàng</a>
              @endif
          </div>
          <div class="d-none d-lg-flex ms-auto">
            @if (Auth::check())
                <div class="nav-item dropdown">
                    <img src="{{Auth::user()->avatar}}" alt="" class="btn-sm-square bg-white rounded-circle ms-3">
                    <div class="dropdown-menu mt-2">
                        @if (Auth::user()->role == 2)
                            <a href="{{ asset('/dashboard') }}" class="dropdown-item">Quản trị</a>
                        @endif
                        <a href="feature.html" class="dropdown-item">Hồ sơ</a>
                        <a href="{{ asset('/logout') }}" class="dropdown-item">Đăng xuất</a>
                    </div>
                </div>
            @else
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{ route('form.getLogin') }}">
                    <small class="fa fa-user text-body"></small>
                </a>
            @endif
              <button class="btn-sm-square bg-white rounded-circle ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <small class="fa fa-search text-body"></small>
              </button>
              <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{ route('client.getCart') }}">
                  <small class="fa fa-shopping-bag text-body"></small>
              </a>
          </div>
      </div>
  </nav>
</div>
<!-- Navbar End -->
 <!-- Full Screen Search Start -->
<form action="{{ route('client.search') }}" method="get">
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content modal-search">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        @csrf
                        <input type="text" name="name" class="form-control bg-transparent border-light p-3 search-input" placeholder="Tìm kiếm...">
                        <button type="submit" class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Full Screen Search End -->

<!-- Modal Đăng nhập -->
{{-- <div class="modal fade" id="ModalLogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-login">
          <!-- Login Form -->
          <form action="" method="post" id="form">
            <div class="modal-header">
              <h5 class="modal-title">Đăng nhập</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" id="name" class="form-control" name="name"/>
                    <label class="form-label" for="form3Example1">Tên đăng nhâp</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" id="password" class="form-control" name="password"/>
                    <label class="form-label" for="form3Example2">Mật khẩu</label>
                </div>
              <div class="mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="remember">
                  <label class="form-check-label" for="remember">Ghi nhớ tài khoản</label>
                  <a type="button" class="float-end">Bạn quên mật khẩu ?</a>
              </div>
            </div>
            <div class="modal-footer pt-4">                  
              <button type="submit" class="btn btn-dark mx-auto w-100" id="ajaxSubmit">Đăng nhập</button>
            </div>
            <p class="text-center">Bạn chưa có tài khoản, <a type="button" class data-bs-toggle="modal" data-bs-target="#ModalRegister">Đăng ký</a></p> 
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Đăng ký -->
<div class="modal fade" id="ModalRegister" tabindex="-1" aria-hidden="true"> --}}
    {{-- <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-register">
          <!-- Login Form -->
          <form action="" method="post">
            <div class="modal-header">
              <h5 class="modal-title">Đăng ký</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name"/>
                            <label class="form-label" for="form3Example3">Họ và tên</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="username" id="username"/>
                            <label class="form-label" for="form3Example4">Tên đăng nhâp</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="email" id="email"/>
                    <label class="form-label" for="form3Example5">Email</label>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating">
                            <input type="date" class="form-control" name="birthday" id="birthday"/>
                            <label class="form-label" for="form3Example5">Ngày sinh</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="phone" id="phone"/>
                            <label class="form-label" for="form3Example7">Số điện thoại</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="address" id="address"/>
                    <label class="form-label" for="form3Example6">Địa chỉ</label>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="password" id="password"/>
                            <label class="form-label" for="form3Example8">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="password-again" id="password-again"/>
                            <label class="form-label" for="form3Example9">Xác nhận mật khẩu</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-4">                  
              <button type="submit" class="btn btn-dark mx-auto w-100">Đăng ký</button>
            </div>
            <p class="text-center">Bạn chưa có tài khoản, <a type="button" class data-bs-toggle="modal" data-bs-target="#ModalLogin">Đăng nhập</a></p>  
        </form>
      </div>
    </div>
  </div> --}}