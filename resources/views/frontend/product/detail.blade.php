@extends('frontend.master.master')
@section('content')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(../uploads/{{$product->img}});">

										</div>

									</div>
								</div>
								<div class="col-md-7">
									<form action="{{route('cart.add')}}" method="get">
										@csrf
										<div class="desc">
											<h3>{{$product->name}}</h3>
											<p class="price">
												<span>{{number_format($product->price,0,'','.')}} đ</span>
											</p>
											<p>{{$product->info}}</p>
											<p style="text-align: justify;">
												{{$product->description}}
											</p>
											<div class="row row-pb-sm">
												<div class="col-md-4">
													<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
																<i class="icon-minus2"></i>
															</button>
														</span>
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
																<i class="icon-plus2"></i>
															</button>
														</span>
													</div>
												</div>
											</div>
											<input type="hidden" name="id_product" value="{{$product->id}}">
											<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										{{$product->description}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Mới</span></h2>
					</div>
				</div>
				<div class="row">
					@foreach ($newest as $prd_new)
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url(../uploads/{{$prd_new->img}});">
									<div class="cart">
										<p>
											<span class="addtocart"><a href="cart.html"><i
														class="icon-shopping-cart"></i></a></span>
											<span><a href="detail.html"><i class="icon-eye"></i></a></span>


										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="detail.html">{{$prd_new->name}}</a></h3>
									<p class="price"><span>{{ number_format($prd_new->price,0,'','.')}} đ</span></p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection

@section('scripts')
	@parent
	<script>
		var quantity=1;
		$('.quantity-right-plus').click(function () {
			var quantity = parseInt($('#quantity').val());
			$('#quantity').val(quantity + 1);
		});

		$('.quantity-left-minus').click(function (e) {
			var quantity = parseInt($('#quantity').val());
				if (quantity > 1) {
					$('#quantity').val(quantity - 1);
				}
		});
	</script>
@endsection
