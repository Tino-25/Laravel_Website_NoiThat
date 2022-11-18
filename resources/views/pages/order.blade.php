@extends('layout')
@section('content')
@foreach($user as $key => $user)
<div id="body_pay">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="body-content">
					<div class="body-content__top">
						<h2>Thông tin khách hàng</h2>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="firstname">First name</label>
							<input type="firstname" class="form-control" id="firstname"
							placeholder="First name" value="{{$user->firstName}}">
						</div>
						<div class="form-group col-md-6">
							<label for="lastname">Last name</label>
							<input type="text" class="form-control" id="lastname"
							placeholder="Last name" value="{{$user->lastName}}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" id="inputAddress"
						placeholder="Nhập địa chỉ" value="{{$user->address}}">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="sex">sex</label>
							<input type="text" class="form-control" value="{{$user->sex}}">
						</div>
						<div class="form-group col-md-6">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" value="{{$user->phone}}">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email">email</label>
							<input type="text" class="form-control" value="{{$user->email}}">
						</div>
						<div class="form-group col-md-6">
							<label for="password">password</label>
							<input type="text" class="form-control" value="{{$user->password}}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-1"></div>
			<div class="col-5">
				<div class="body-content__top">
					<h2>Thông tin đơn hàng</h2>
				</div>

				<form action="{{URL::to('/order-action')}}" method="post" class="form_action">
					{{ csrf_field() }}
					<input type="hidden" name="">
					<input type="hidden" name="">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Tổng</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$content = Cart::content();
								// dữ liệu dạng chuỗi để insert orderdetails
								// có dạng idproduct-soluongmua--idproduct-soluongmua-- ...
								$data_to_insert_orderdetails='';
							?>
							@foreach($content as $v_content)
							<tr>
								<td>{{$v_content->name}} × {{$v_content->qty}}</td>
								<td>
									<?php 
									echo $v_content->qty * $v_content->price;
									?>
								</td>
							</tr>
							<?php 
								// idproduct-soluongmua--idproduct-soluongmua-- ...
								$data_to_insert_orderdetails=
								$data_to_insert_orderdetails.''.$v_content->id.'-'.$v_content->qty.'--';
							?>
							@endforeach
							
						</tbody>
						<tfoot>
							<tr>
								<td>Tổng đơn hàng</td>
								<td>{{Cart::subtotal()}}</td>
							</tr>
						</tfoot>
					</table>
					<button class="form__btn btn_order" type="submit" class="btn btn-primary">Gửi</button>
					<!-- chỉ thêm vào order idUser, các thông tin còn lại để mặc định -->
					<input type="hidden" name="idUser" value="<?php echo Session::get('idUser'); ?>">
					<!-- dữ liệu thêm vào orderdetails -->
					<input type="hidden" name="stringOrderDetails" value="{{$data_to_insert_orderdetails}}">
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection