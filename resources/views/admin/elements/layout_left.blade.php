<div class="admin_left">
	<div class="left_head">
		<img src="{{asset('./img/logo_giaphat.jpg')}}" alt="">
		<div class="left_head__text">
			<span>GIA PHÁT</span>
			<p>Chuyên nội thất gia đình</p>
		</div>
	</div>
	<div class="left_body">
		<ul class="nav-list">
			<li class="nav-list__item">
				<a class="nav-list__item--link" href="{{URL::to('/administrator')}}">
					Tổng quan
					<i class="fas fa-caret-right"></i>
				</a>
			</li>
			<li class="nav-list__item">
				<a class="nav-list__item--link" href="{{URL::to('/user-list')}}">
					Quản lý người dùng
					<i class="fas fa-caret-right"></i>
				</a>
			</li>
			<li class="nav-list__item">
				<a class="nav-list__item--link" href="{{URL::to('/category-list')}}">
					Quản lý loại sản phẩm
					<i class="fas fa-caret-right"></i>
				</a>
			</li>
			<li class="nav-list__item">
				<a class="nav-list__item--link" href="{{URL::to('/product-list')}}">
					Quản lý sản phẩm
					<i class="fas fa-caret-right"></i>
				</a>
			</li>
			<li class="nav-list__item">
				<a class="nav-list__item--link" href="{{URL::to('/order-list')}}">
					Quản lý hóa đơn
					<i class="fas fa-caret-right"></i>
				</a>
			</li>
		</ul>
	</div>
</div>