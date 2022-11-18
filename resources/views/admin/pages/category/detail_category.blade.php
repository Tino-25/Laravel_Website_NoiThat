@extends('admin.index')
@section('content')
@foreach($details_category as $key => $category)
<div class="container form--wrap">
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Chi tiết loại sản phẩm</h3>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="categoryName">Name Category</label>
			<input disabled type="text" name="categoryName" class="form-control" id="categoryName" value="{{$category->categoryName}}">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="categoryImage">Image Category</label>
			<img src="{{asset('./img/category/'.$category->categoryImage)}}" alt="" class="img_big">
		</div>
	</div>
	<div class="form-group">
		<label for="categoryDesc">Category Description</label>
		<textarea disabled name="categoryDesc" id="categoryDesc">{{$category->categoryDesc}}</textarea>
	</div>
</div>
@endforeach
@endsection