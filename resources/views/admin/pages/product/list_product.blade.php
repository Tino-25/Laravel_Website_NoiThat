@extends('admin.index')
@section('content')
<div class="container">
	<div class="title_top">
	<span>Quản lý sản phẩm</span>
</div>
<a href="{{URL::to('/add-product-form')}}">Thêm sản phẩm</a>
<table class="table">
	<thead class="thead-light">
		<tr>
			<th scope="col">#id</th>
			<th scope="col">idCategory</th>
			<th scope="col">Color</th>
			<th scope="col">idSize</th>
			<th scope="col">ProductName</th>
			<th scope="col">productUnitPrice</th>
			<th scope="col">dateIn</th>
			<th scope="col">ProductDescription</th>
			<th scope="col">Product Image</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($all_product as $key => $product)
			<tr>
				<th scope="row">{{$product->idProduct}}</th>
				<td>{{$product->idCategoryProduct}} - {{$product->categoryName}}</td>
				<td>{{$product->idColor}} - {{$product->color}}</td>
				<td>{{$product->idSize}} - {{$product->size}}</td>
				<td>{{$product->productName}}</td>
				<td>{{$product->productUnitPrice}}</td>
				<td>{{$product->dateIn}}</td>
				<td>{!!$product->productDescription!!}</td>
				<td>
					<a href="{{URL::to('/image_product/'.$product->idProduct)}}">Quản lý hình ảnh</a>
				</td>
				<td>
					<a href="{{URL::to('/detail_product/'.$product->idProduct)}}">Xem chi tiết</a>
					<br>
					<a href="{{URL::to('/delete_product/'.$product->idProduct)}}">Xóa</a>
					<br>
					<a href="{{URL::to('/update_product_form/'.$product->idProduct)}}">Sửa SP</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection