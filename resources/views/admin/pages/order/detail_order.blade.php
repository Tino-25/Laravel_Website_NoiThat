@extends('admin.index')
@section('content')
@foreach($detail_order as $key => $detail)
<div class="container form--wrap">
	<div class="form-row">
		<h2>Thông tin đơn hàng</h2>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="dateorder">Ngày mua</label>
			<input disabled type="text" class="form-control" id="dateorder" name="dateorder" value="{{$detail->dateOrder}}">
		</div>
		<div class="form-group col-md-3">
			<label for="quantity">Số lượng mua</label>
			<input disabled type="text" class="form-control" id="quantity" name="quantity" value="{{$detail->quantityOrder}}">
		</div>
		<div class="form-group col-md-3">
			<label for="discount">Giảm giá</label>
			<input disabled type="text" class="form-control" id="discount" name="discount" value="{{$detail->discount}}">
		</div>
		<div class="form-group col-md-3">
			<label for="sumprice">Tổng tiền</label>
			<input disabled type="text" class="form-control" id="sumprice" name="sumprice" value="{{$detail->productUnitPrice * $detail->quantityOrder}}">
		</div>
	</div>
</div>
<br>


<div class="container form--wrap">
	<div class="form-row">
		<h2>Chi tiết sản phẩm đã mua</h2>
	</div>
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="category">Category Product</label>
			<select disabled id="category" name="size" class="form-control">
				<option selected>{{$detail->categoryName}}</option>
			</select>
		</div>
		<div class="form-group col-md-4">
			<label for="size">Size</label>
			<select disabled id="size" name="size" class="form-control">
				<option selected>{{$detail->size}}</option>
			</select>
		</div>
		<div class="form-group col-md-4">
			<label for="color">Color</label>
			<select disabled id="color" name="color" class="form-control">
				<option selected>{{$detail->color}}</option>
			</select>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="nameproduct">Name Product</label>
			<input disabled type="text" class="form-control" id="nameproduct" placeholder="Nhập tên sản phẩm" name="nameproduct" value="{{$detail->productName}}">
		</div>
		<div class="form-group col-md-6">
			<label for="unitprice">Unit Price</label>
			<input disabled type="text" class="form-control" id="unitprice" placeholder="Nhập đơn giá" name="unitprice" value="{{$detail->productUnitPrice}}">
		</div>
	</div>
	<div class="form-group">
		<label for="dateIn">Date In</label>
		<input disabled type="text" name="dateIn" class="form-control" id="dateIn" placeholder="Ngày nhập hàng" value="{{$detail->dateIn}}">
	</div>
	<div class="form-group">
		<label for="desc">Description</label>
		<input disabled type="text" name="desc" class="form-control" id="desc" placeholder="Mô tả sản phẩm" name="desc" value="{{$detail->productDescription}}">
	</div>
</div>
<br>


<div class="container form--wrap">
	<div class="form-row">
		<div class="form-group col-md-12">
			<h3>Người mua sản phẩm</h3>
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