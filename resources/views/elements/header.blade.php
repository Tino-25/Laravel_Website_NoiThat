<header id="header">
	<div class="container header-top">
		<div class="row">
			<div class="col-lg-2">
				<div class="header-top_logo">
					<a href="{{URL::to('/')}}">
						<img src="{{asset('img/logo_giaphat.jpg')}}" alt="Logo Gia Phát">
					</a>
				</div>
			</div>
			<div class="col-8 header-top_main">
				<form action="{{URL::to('/search-product')}}" method="get">
					{{ csrf_field() }}
					<div class="header-top_search">
						<input type="text" name="productSearch" placeholder="Tìm kiếm">
						<div class="header-top_search__icon">
							<button type="submit" style="border: none; background-color: transparent; outline: none;">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				<div class="header-top_hotline header-top__content--wrap">
					<i class="fas fa-phone-volume header-top--icon"></i>
					<div class="header-top__content_item header-top__hostline">
						<span>Hotline</span>
						<p>
							<a href="tel:0981808477">0981.80.84.77</a>
						</p>
					</div>
				</div>
				<div class="header-top_account header-top__content--wrap">
					<i class="far fa-user header-top--icon"></i>
					<div class="header-top__content_item header-top__account">
						<span>
							<?php
							if(Session::get('idUser')!=null && Session::get('email')!=null && Session::get('name')!=null){
								echo "Xin chào ".Session::get('name');
							}else{ ?>
								<a href="{{URL::to('/register')}}">Đăng ký tài khoản</a>
							<?php } ?>
						</span>
						<br>
						<span>
							<?php
							if(Session::get('idUser')!=null && Session::get('email')!=null && Session::get('name')!=null){ ?>
								<a href="{{URL::to('/logout')}}">Đăng xuất</a>
							<?php }else{ ?>
								<a href="{{URL::to('/login')}}">Đăng nhập</a>
							<?php } ?>
						</span>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="header-top__interactive">
					<div class="header-top__interactive__item">
						<i class="fas fa-heart"></i>
					</div>
					<div class="header-top__interactive__item">
						<i class="fas fa-random"></i>
					</div>
					<div class="header-top__interactive__item header-top__interactive__item--cart">
						<a href="{{URL::to('/show-cart')}}">
							<i class="fas fa-shopping-cart"></i>
							<?php if(Cart::count() != 0){ ?>
								<span class="notice">
									<?php echo Cart::count(); ?>
								</span>
							<?php } ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-navbar">
		<div class="container header-navbar__wrap">
			<div class="header-navbar__category">
				<i class="fas fa-stream"></i>
				<span>Danh mục sản phẩm</span>
				<ul class="header-navbar__category__hover__list">
					@foreach($all_category as $key => $cate)
					<a href="{{URL::to('/show-product-category/'.$cate->idCategoryProduct)}}">
						<li class="header-navbar__category__hover__item">
							{{$cate->categoryName}}

						</li>
					</a>
					@endforeach
				</ul>
			</div>
			<div class="header-navbar__list-wrap">
				<ul class="header-navbar__list">
					<li class="header-navbar__List__item">
						<a href="{{URL::to('/')}}">
							Trang chủ
						</a>
					</li>
					<li class="header-navbar__List__item">
						<a href="{{URL::to('#')}}">
							Giới thiệu
						</a>
					</li>
					<li class="header-navbar__List__item header-navbar__List__item__product">
						<a href="{{URL::to('/store')}}">
							Sản phẩm
						</a>
						<i class="fas fa-chevron-down"></i>
						<ul class="header-navbar__List__item__product__list">
							<a href="{{URL::to('/search-product?ban')}}">
								<li class="header-navbar__List__item__product__item">
									Bàn
								</li>
							</a>
							<a href="{{URL::to('/search-product?ghe')}}">
								<li class="header-navbar__List__item__product__item">
									Ghế
								</li>
							</a>
							<a href="{{URL::to('/search-product?tu')}}">
								<li class="header-navbar__List__item__product__item">
									Tủ
								</li>
							</a>
							<a href="{{URL::to('/store')}}">
								<li class="header-navbar__List__item__product__item">
									Xem tất cả
								</li>
							</a>
						</ul>
					</li>
					<li class="header-navbar__List__item">
						<a href="{{URL::to('#')}}">
							Tin tức
						</a>
					</li>
					<li class="header-navbar__List__item">
						<a href="{{URL::to('#')}}">
							Tuyển dụng
						</a>
					</li>
					<li class="header-navbar__List__item">
						<a href="{{URL::to('#')}}">
							Liên hệ
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>