@extends('layout')
@section('content')
<div id="body_cuahang">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="cuahang__subnav">
					<div class="subnav__header">
						<h3 class="subnav__header__text">Lọc Sản Phẩm</h3>
					</div>
					<ul class="subnav__list">
						<li class="subnav__list-item">
							<span class="subnav__list-item__text">Loại sản phẩm</span>
							<div class="subnav__filter-price">
								<ul class="subnav__filter-price__list">
									@foreach($all_category as $key=>$cate)
									<li class="subnav__filter-price__list-item">
										<a href="{{URL::to('/show-product-category/'.$cate->idCategoryProduct)}}">{{$cate->categoryName}}</a>
									</li>
									@endforeach
								</ul>
							</div>                                    
						</li>
						<li class="subnav__list-item">
							<span class="subnav__list-item__text">Giá</span>
							<div class="subnav__filter-price">
								<ul class="subnav__filter-price__list">
									<li class="subnav__filter-price__list-item">
										<a href="{{URL::to('/filter_price/1')}}">Dưới 1 triệu</a> 
									</li>
									<li class="subnav__filter-price__list-item">
										<a href="{{URL::to('/filter_price/1-3')}}">1 triệu - 3 triệu</a> 
									</li>
									<li class="subnav__filter-price__list-item">
										<a href="{{URL::to('/filter_price/3-5')}}">3 triệu đến 5 triệu</a> 

									</li>
									<li class="subnav__filter-price__list-item">
										<a href="{{URL::to('/filter_price/5-')}}">Lớn hơn 5 triệu</a> 
									</li>
								</ul>
							</div>                                    
						</li>

						<!--<li class="subnav__list-item">
							<span class="subnav__list-item__text">Màu</span>
							<div class="subnav__filter-price">
								<ul class="subnav__filter-price__list">
									<li class="subnav__filter-price__list-item">
										<input type="radio" name="filter-price" id="">
										<label for="filter-price">Vàng</label>
									</li>
									<li class="subnav__filter-price__list-item">
										<input type="radio" name="filter-price" id="">
										<label for="filter-price">cam</label>
									</li>
									<li class="subnav__filter-price__list-item">
										<input type="radio" name="filter-price" id="">
										<label for="filter-price">Hồng</label>
									</li>
								</ul>
							</div>
						</li>
					-->
				</ul>
			</div>
		</div>
		<div class="col-lg-9">
			<h1 class="store-title">
				{{$title}}
				<?php
					if($title == "Sắp xếp mới nhất"){
						$sort_new = true;
					} 
					if($title == "Sắp xếp giá giảm dần"){
						$price_desc = true;
					} 
					if($title == "Sắp xếp giá tăng dần"){
						$price_asc = true;
					}
					if($title == "Sắp xếp sản phẩm bán chạy"){
						$sellingProduct = true;
					}
				?>
			</h1>
			<div class="cuahang__product">
				<div class="cuahang__product__header">
					<span class="cuahang__product__header__text">Sắp xếp theo: </span>
					<!--<a href="#" class="cuahang__product__header__btn">
						Phổ biến
					</a>-->
					<a href="{{URL::to('/store-sort-new')}}" class="cuahang__product__header__btn <?php if(isset($sort_new)) echo "active" ?>">
						Mới nhất
					</a>
					<a href="{{URL::to('/product-best-selling')}}" class="cuahang__product__header__btn <?php if(isset($sellingProduct)) echo "active" ?>">
						bán chạy
					</a>
					<div class="cuahang__product__header__btn cuahang__product__header__btn--wrap <?php if(isset($price_desc) || isset($price_asc)) echo "active"; ?>">
						<?php 
						if(isset($price_desc)){
							echo "Giá: từ cao đến thấp";
						}elseif(isset($price_asc)){
							echo "Giá: từ thấp đến cao";
						}else{
							echo "Giá";
						}
						?>
						<i class="fas fa-chevron-down"></i>
						<ul class="filter__sort">
							<li class="filter__sort-item">
								<a href="{{URL::to('/store-sort-price-asc')}}">
									Giá: từ thấp đến cao
								</a>
							</li>
							<li class="filter__sort-item">
								<a href="{{URL::to('/store-sort-price-desc')}}">
									Giá: từ cao đến thấp
								</a>
							</li>
						</ul>
					</div>

					<!-- phân trang
					<div class="devide__page">
						<div class="devide__page__text">
							<span class="devide__page__text--page">1</span>
							<span class="devide__page__text--sumpage">/25</span>
						</div>
						<div class="devide__page__btn">
							<div class="devide__page__btn__item devide__page__btn--left">
								<i class="fas fa-chevron-left"></i>
							</div>
							<div class="devide__page__btn__item devide__page__btn--right active">
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>--> 
				</div>
				<div class="cuahang_show-product">
					<div class="grid_row show-product__home">
						<!-- item product -->
						@foreach($all_product as $key => $product)
						<!-- price thường -->
						<div class="show-product__home__item">
							<img src="{{asset('img/product/'.$product->image)}}" alt="">
							<p class="name__product">
								{{$product->productName}}
							</p>
							<p class="price__product">
								{{$product->productUnitPrice}}
							</p>
							<a class="show-product__home__item--btn" href="#">Xem chi tiết</a>
						</div>
						@endforeach
					</div>
					<!-- phân trang -->
					<!--<div class="grid_row cuahang_product__paging--wrap">
						<div class="cuahang_product__paging">
							<a href="#" class="cuahang_product__paging__btn-left">
								<i class="fas fa-chevron-left"></i>
							</a>
							<ul class="cuahang_product__paging-list">
								<li class="cuahang_product__paging-item active">
									<a href="#">1</a>
								</li>
								<li class="cuahang_product__paging-item">
									<a href="#">2</a>
								</li>
								<li class="cuahang_product__paging-item">
									<a href="#">3</a>
								</li>
								<li class="cuahang_product__paging-item">
									<a href="#">...</a>
								</li>
								<li class="cuahang_product__paging-item">
									<a href="#">50</a>
								</li>
							</ul>
							<a href="#" class="cuahang_product__paging__btn-right">
								<i class="fas fa-chevron-right"></i>
							</a>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection