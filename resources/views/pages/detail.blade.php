@extends('layout')
@section('content')
@foreach($product_detail as $key => $detail)
<div id="main_chitietsp">
	<div id="body_chitietsp">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="chitietsp_layout_main">
						<form action="{{URL::to('/add-product-cart')}}" method="post">
							{{ csrf_field() }}
							<!-- Start Dữ liệu gửi qua cho cart -->
							<input type="hidden" name="id_product__hidden" value="{{$detail->idProduct}}">
							<input type="hidden" name="image_product__hidden" value="{{$detail->image}}">
							<input type="hidden" name="name_product__hidden" value="{{$detail->productName}}">
							<input type="hidden" name="price_product__hidden" value="{{$detail->productUnitPrice}}">
							<!-- end ... -->
							<div class="row">
								<div class="col-4">
									<div class="chitietsp__img">
										<div class="chitietsp__img-main">
											<img src="{{asset('./img/product/'.$detail->image)}}" alt="ảnh sản phẩm - ảnh chính">
										</div>
										<div class="chitietsp__img-mini">
											@foreach($image_notMain as $key => $img)
											<img src="{{asset('./img/product/'.$img->image)}}" alt="ảnh sản phẩm - các ảnh phụ">
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-7">
									<div class="chitietsp_wrap">
										<div class="chitietsp--item chitietsp_namesp">
											<h2>{{$detail->productName}}</h2>
										</div>
										<div class="chitietsp--item chitietsp_status">
											<span class="chitietsp_status--title">Tình trạng: </span>
											<span class="chitietsp_status--content">Còn trong kho</span>
										</div>
										<div class="chitietsp--item chitietsp_price">
											<span class="chitietsp_price--curent">
												{{$detail->productUnitPrice}}
											</span>
											<!--<span class="chitietsp_price--old">1,000.000đ</span>-->
										</div>
										<div class="chitietsp--item chitietsp_quantity">
											<a href="#" class="chitietsp_quantity--minus">-</a>
											<input class="get_quantity" type="text" name="get_quantity" id="" value="1">
											<a href="#" class="chitietsp_quantity--plus">+</a>
										</div>
										<div class="chitietsp--item chitietsp_btn">
											<button class="chitietsp_btn__add-cart" type="submit">
												Thêm vào giỏ
											</button>
											<a class="chitietsp_btn__buy-now" href="#">Mua ngay</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- mô tả -->
					<div class="chitietsp_describe">
						<div class="chitietsp_describe__top">
							<h3>Mô tả</h3>
						</div>
						<div class="chitietsp_describe__content">
							{!!$detail->productDescription!!}
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="chitietsp__layout-right">
						<!-- địa chỉ -->
						<div class="chitietsp__layout-right__content">
							<div class="chitietsp__layout-right__content__top">
								<h4>Sản phẩm có tại</h4>
							</div>
							<div class="chitietsp__layout-right__content__body">
								<ul class="chitietsp__layout-right__content__body__list">
									<li class="chitietsp__layout-right__content__body__item">
										<i class="fas fa-circle"></i>
										Cơ sở 1, số nhà, tên đường, tỉnh, thành phố
									</li>
								</ul>
							</div>
						</div>
						<!-- Sản phẩm tương tự -->
						<div class="similar-product">
							<div class="similar-product__top">
								<h3>Sản phẩm tương tự</h3>
							</div>
							<!-- item similar product -->
							@foreach($similar_product as $similar)
							<div class="similar-product__content">
								<img class="similar-product__img" src="{{asset('./img/product/'.$similar->image)}}" alt="">
								<div class="similar-product__content_text">
									<p class="name">{{$similar->productName}}</p>
									<p class="price">{{$similar->productUnitPrice}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endforeach
@endsection