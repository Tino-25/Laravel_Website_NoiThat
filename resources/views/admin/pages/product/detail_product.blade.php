@extends('admin.index')
@section('content')
@foreach($product_detail as $key => $detail)
<div class="container form--wrap">
	<div class="form-row">
		<h2>Chi tiết sản phẩm</h2>
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
@endforeach
@endsection