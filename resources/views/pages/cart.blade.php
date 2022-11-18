@extends('layout')
@section('content')
<?php
$content = Cart::content();
?>
<?php 
?>
<div id="body_cart">
	<div class="container">
		<div class="row">
			<div class="col-lg cart-top">
				<h2 class="cart-top__head">Giỏ hàng của bạn</h2>
				<p class="cart-top__text">Có {{Cart::count()}} sản phẩm trong giỏ hàng</p>
				<div class="cart-top__block"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-8">
				<div class="cart-body">
					<!-- Item -->
					@foreach($content as $v_content)
					<div class="cart-body__item">
						<div class="row cart-body__item--wrap">
							<div class="col-2">
								<div class="cart-body__item__img">
									<img src="{{asset('./img/product/'.$v_content->options->productImage)}}" alt="">
								</div>
							</div>
							<div class="col-7">
								<div class="cart-body__item__content">
									<h3 class="cart-body__item__content-head">
										{{$v_content->name}}
									</h3>
									<p class="cart-body__item__content-price">
										{{$v_content->price}}
									</p>
									<div class="cart-body__item__content-btn">
										<a href="{{URL::to('/update-cart-quantity/idRow/'.$v_content->rowId.'/cart_quantity/')}}<?php echo '/'.(int)($v_content->qty - 1); ?>" class="cart-body__item__content-btn--plus">
											-
										</a>
										<input type="text" name="" id="" value="{{$v_content->qty}}">
										<a href="{{URL::to('/update-cart-quantity/idRow/'.$v_content->rowId.'/cart_quantity/')}}<?php echo '/'.(int)($v_content->qty + 1); ?>" class="cart-body__item__content-btn--minus">+</a>
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="cart-body__item__end">
									<a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">
										<div class="cart-body__item__end-x">
											<i class="fas fa-times"></i>
										</div>
									</a>
									<p class="cart-body__item__end__sum-price">
										{{$v_content->qty}} * {{$v_content->price}}
									</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<!-- enditem -->
				</div>
			</div>
			<div class="col-4">

				<?php if(Cart::count() != 0){ ?>
					<div class="cart__info-order">
						<div class="cart__info-order-head">
							<h2 class="cart__info-order-head--text">
								Thông tin đơn hàng
							</h2>
						</div>
						<hr>
						<div class="cart__info-order-price">
							<span class="cart__info-order-price--text">Tổng tiền</span>
							<span class="cart__info-order-price--price">
								<?php
								$sum_no_tax = Cart::subtotal();
								echo $sum_no_tax;
								?>
							</span>
						</div>
						<hr>
						<div class="cart__info-order-text">
							<p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
							<p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
						</div>
						<div class="cart__info-order-btn">
							<?php if(Session::get('idUser') == null){ ?>
								<a href="{{URL::to('/order-infomation')}}" class="pay-btn">Đặt Hàng (khách hàng mới)</a>
							<?php }else{ ?>
								<a href="{{URL::to('/order')}}" class="pay-btn">Đặt Hàng</a>
							<?php } ?> 
							<a href="{{URL::to('/')}}" class="continue-buy-btn">
								<i class="fas fa-backward"></i>
								Tiếp tục mua hàng
							</a>
						</div>
					</div>
					
				<?php } ?>
			</div>
		</div>
	</div>
</div>
@endsection