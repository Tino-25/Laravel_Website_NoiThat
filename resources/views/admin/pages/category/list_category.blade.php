@extends('admin.index')
@section('content')
<div class="container">
	<div class="title_top">
		<span>Quản lý Loại sản phẩm</span>
	</div>
	<a href="{{URL::to('/add-category-form')}}">Thêm loại sản phẩm</a>
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th scope="col">#idCategoryProduct</th>
				<th scope="col">categoryName</th>
				<th scope="col">categoryDesc</th>
				<th scope="col">categoryImage</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($all_category as $key => $category)
			<tr>
				<th scope="row">{{$category->idCategoryProduct}}</th>
				<td>{{$category->categoryName}}</td>
				<td>{{$category->categoryDesc}}</td>
				<td>
					<img class="img_small" src="{{asset('./img/category/'.$category->categoryImage)}}" alt="">
				</td>
				<td>
					<a href="{{URL::to('/detail-category/'.$category->idCategoryProduct)}}">Xem chi tiết</a>
					<br>
					<a href="{{URL::to('/delete-category/'.$category->idCategoryProduct)}}">Xóa</a>
					<br>
					<a href="{{URL::to('/update-category-form/'.$category->idCategoryProduct)}}">Chỉnh sửa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection