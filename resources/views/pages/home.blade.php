@extends('layout')
@section('content')
<div class="body__header">
	<div id="banner">
		<div class="container banner__wrap">
			<img src="{{asset('img/banner/banner.jpg')}}" alt="Banner">
		</div>
	</div>
	<div id="body__show-category">
		<div class="container body__show-category__wrap">
			@foreach($all_category as $key => $cate)
			<!-- category item -->
			<div class="category-item">
				<img class="category-item__img" src="{{asset('img/category/'.$cate->categoryImage)}}" alt="">
				<p class="category-item__name">
					<?php 
						// tách chuỗi thành từng từ rồi lấy 2 từ cuối
						$explode_word = explode(' ', $cate->categoryName);
						echo $explode_word[count($explode_word)-2].' '.$explode_word[count($explode_word)-1];
					?>
				</p>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- body content -->
<div class="body-content">
	<!-- best selling products -->
	<div class="body-content__item">
		<div class="container">
			<div class="body-content__item__header">
				<hr class="hr-dashed body-content__item__header__hr">
				<div class="body-content__item__header__text">
					<span>Sản phẩm bán chạy</span>
				</div>
			</div>
			<div class="show-product__home">
				@foreach($sellingProduct as $key => $sellingProduct)
				<!-- price thường -->
				<div class="show-product__home__item">
					<img src="{{asset('img/logo_giaphat.jpg')}}" alt="">
					<p class="name__product">
						{{$sellingProduct->productName}}
					</p>
					<p class="price__product">
						{{$sellingProduct->productUnitPrice}}
					</p>
					<a class="show-product__home__item--btn" href="{{URL::to('/show_detail_product/'.$sellingProduct->idProduct)}}">Xem chi tiết</a>
				</div>
				@endforeach
				<!-- price discount -->
				<!--
				<div class="show-product__home__item">
					<img src="{{asset('img/logo_giaphat.jpg')}}" alt="">
					<p class="name__product">Nội thất nhựa Ecoplast cao cấp tại toàn nhà son đà nẵng</p>
					<p class="price__product">
						<span class="price__product--old">5,000.000đ</span>
						4,600.000đ
					</p>
					<a class="show-product__home__item--btn" href="#">Xem chi tiết</a>
				</div>
			-->
			</div>
			<a class="body-content__item--more" href="{{URL::to('/product-best-selling')}}">
				Xem thêm <i	class="fas fa-angle-double-right"></i>
			</a>
		</div>
	</div>

	<!-- Tủ nhựa cao cấp -->
	<div class="body-content__item">
		<div class="container">
			<div class="body-content__item__header">
				<hr class="hr-dashed body-content__item__header__hr">
				<div class="body-content__item__header__text">
					<span>Nội thất gia đình</span>
				</div>
			</div>
			<div class="show-product__home">
				@foreach($homeProduct as $key => $homeproduct)
				<div class="show-product__home__item">
					<img src="{{asset('img/product/'.$homeproduct->image)}}" alt="">
					<p class="name__product">
						{{$homeproduct->productName}}
					</p>	
					<p class="price__product">
						{{$homeproduct->productUnitPrice}}
					</p>
					<a class="show-product__home__item--btn" href="#">Xem chi tiết</a>
				</div>
				@endforeach
				<!--<div class="show-product__home__item">
					<img src="{{asset('img/logo_giaphat.jpg')}}" alt="">
					<p class="name__product">Nội thất nhựa Ecoplast cao cấp tại toàn nhà son đà nẵng</p>
					<p class="price__product">
						<span class="price__product--old">5,000.000đ</span>
						4,600.000đ
					</p>
					<a class="show-product__home__item--btn" href="#">Xem chi tiết</a>
				</div>-->
			</div>
			<a class="body-content__item--more" href="{{URL::to('/show-product-category/1')}}">
				Xem thêm <i class="fas fa-angle-double-right"></i>
			</a>
		</div>
	</div>

	<!-- Bàn học sinh và giá đựng sách -->
	<div class="body-content__item">
		<div class="container">
			<div class="body-content__item__header">
				<hr class="hr-dashed body-content__item__header__hr">
				<div class="body-content__item__header__text">
					<span>Nội thất văn phòng</span>
				</div>
			</div>
			<div class="show-product__home">
				@foreach($officeProduct as $key => $officeproduct)
				<div class="show-product__home__item">
					<img src="{{asset('img/product/'.$officeproduct->image)}}" alt="">
					<p class="name__product">
						{{$officeproduct->productName}}
					</p>
					<p class="price__product">
						{{$officeproduct->productUnitPrice}}
					</p>
					<a class="show-product__home__item--btn" href="#">Xem chi tiết</a>
				</div>
				@endforeach
				<!--<div class="show-product__home__item">
					<img src="{{asset('img/logo_giaphat.jpg')}}" alt="">
					<p class="name__product">Nội thất nhựa Ecoplast cao cấp tại toàn nhà son đà nẵng</p>
					<p class="price__product">
						<span class="price__product--old">5,000.000đ</span>
						4,600.000đ
					</p>
					<a class="show-product__home__item--btn" href="#">Xem chi tiết</a>
				</div>-->
			</div>
			<a class="body-content__item--more" href="{{URL::to('/show-product-category/2')}}">
				Xem thêm 
				<i class="fas fa-angle-double-right"></i>
			</a>
		</div>
	</div>
</div>
<div class="body__bottom">
	<a href="{{URL::to('/store')}}">
		Xem tất cả sản phẩm trong cửa hàng
		<i class="fas fa-angle-double-right"></i>
	</a>
</div>
@endsection