@extends('client.layout.master')
@section('content-tittle','Đơn hàng')
@section('content')
<div class="container-fluid-header"></div>
<main class="cd-main-content">
	<section class="cd-gallery">
		<div id="tab-1" class="tab-pane fade show p-0 active">
			<div class="row g-4 checkEmpty">
				@foreach ($orders as $item)
					<div class="col-xl-4 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
							<div class="product-item p-5">
								<h4 class="text-center pb-4">Mã đơn hàng: <strong>#{{$item->id}}</strong></h4>
									<address>
										<p>Họ và tên: <strong>{{$item->name}}</strong></p>
										<p>Số điện thoại: <strong>{{$item->phone}}</strong></p>
										<p>Địa chỉ: <strong>{{$item->address}}</strong></p>
									</address>
									<hr>
									<p>Số lượng sản phẩm: {{$item->amount}} sản phẩm</p>
									<p>Tổng tiền đơn hàng: {{number_format($item->total,0,',','.')}}đ</p>
									<p>Trạng thái: <strong> @if ($item->status == 1)
										Chờ xác nhận
									@elseif($item->status == 2)
										Đã xác nhận
									@elseif($item->status == 3)
										Đang chuẩn bị
									@elseif($item->status == 4)
										Đang giao
									@elseif($item->status == 5)
										Đã giao
									@elseif($item->status == 6)
										Khách hàng đã nhận hàng
									@endif</strong></p>
									<p>Ngày đặt hàng: {{$item->created_at = date('d-m-Y', strtotime($item->created_at))}}</p>
									<div class="invoice-body row">
										<div class="col">
											<a href="{{ route('client.detailOrder', ['detail'=>$item->id]) }}" class="btn btn-secondary">Xem chi tiết</a>
										</div>
											@if ($item->status != 6 && $item->status != 1)
												<div class="col">
													<form action="{{ route('client.updateStatusOrder', ['order'=>$item->id]) }}" method="post">
														@csrf
														<button type="submit" {{$item->status == 5 ? '' : 'disabled'}} class="btn btn-success">Đã nhận được hàng</button>
													</form>
												</div>
											@endif
										@if ($item->status == 1)
											<div class="col">
												<form action="{{ route('client.cancelOrder', ['order'=>$item->id]) }}" method="post">
													@csrf
													<button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
												</form>
											</div>
										@endif
									</div>	
							</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
</main>
@endsection