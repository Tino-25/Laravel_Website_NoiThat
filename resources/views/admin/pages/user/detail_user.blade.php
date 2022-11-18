@extends('admin.index')
@section('content')
@foreach($detailsUser as $key => $detail)
<div class="container form--wrap">
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Chi tiết người dùng</h3>
		</div>
		<div class="form-group col-md-6">
			<label for="inputState">Division - phân công</label>
			<p>
				<?php 
					if($detail->idUser == 1){
						echo "Quản trị viên";
					}elseif($detail->idUser == 2){
						echo "Khách hàng";
					}else{
						echo "Không xác định";
					}
				?>
			</p>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="lastName">lastName</label>
			<p>{{$detail->lastName}}</p>
		</div>
		<div class="form-group col-md-6">
			<label for="firstName">firstName</label>
			<p>{{$detail->firstName}}</p>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="inputEmail4">Email</label>
			<p>{{$detail->email}}</p>
		</div>
		<div class="form-group col-md-6">
			<label for="inputPassword4">Password</label>
			<p>{{$detail->password}}</p>
		</div>
	</div>
	<div class="form-group">
		<label for="inputAddress">Address</label>
		<p>{{$detail->address}}</p>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="Sex">Sex</label>
			<p>{{$detail->sex}}</p>
		</div>
		<div class="form-group col-md-4">
			<label for="Phone">Phone</label>
			<p>{{$detail->phone}}</p>
		</div>
	</div>
</div>
@endforeach

@endsection