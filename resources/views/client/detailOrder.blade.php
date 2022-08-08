@extends('client.layout.master')
@section('content-tittle','Đơn hàng')
@section('content')
<div class="container order">
    <div class="row gutters">
    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-body p-0">
						<div class="invoice-container">
							<div class="invoice-body">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="table-responsive">
											<table class="table custom-table m-0">
												<thead>
													<tr>
														<th>Mã sản phẩm</th>
														<th>Sản phẩm</th>
														<th>Loại hàng</th>
														<th>Kích cỡ</th>
														<th>Ảnh sản phẩm</th>
														<th>Số lượng</th>
														<th>Giá sản phẩm</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($orderDetail as $item)
													<tr>
														<td>#{{$item->product_id}}</td>
														<td>{{$item->name}}</td>
														<td>{{$item->sector}}</td>
														<td>{{$item->size}}</td>
														<td><img src="{{ asset($item->img) }}" alt="" width="100"></td>
														<td>{{$item->amount}}</td>
														<td>{{number_format($item->price,0,',','.')}}đ</td>
													</tr>
													@endforeach
													<tr>
														<td colspan="2"><h5 class="text-white"><strong>Chi tiết đơn hàng: #{{$detail->id}}</strong></h5></td>
														<td colspan="3">
															<h5 class="text-white"><strong>Tổng tiền</strong></h5>
														</td>			
														<td colspan="2">
															<h5 class="text-white"><strong>{{number_format($totals,0,',','.')}}đ</strong></h5>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Row end -->
		
							</div>
						</div>
					</div>
				</div>
    	</div>
    </div>
</div>
@endsection