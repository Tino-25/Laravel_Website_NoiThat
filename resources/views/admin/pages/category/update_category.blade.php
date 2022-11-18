@extends('admin.index')
@section('content')
@foreach($detail_category as $key => $category)
<div class="container form--wrap">	
	<form action="{{URL::to('/update-category-action/'.$category->idCategoryProduct)}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Chi tiết loại sản phẩm</h3>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="categoryName">Name Category</label>
				<input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="categoryName" value="{{$category->categoryName}}">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="categoryName">Name Category</label>
				<input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="categoryName" value="{{$category->categoryName}}">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="categoryImage">Image Category</label>
				<input type="file" name="categoryImage" class="form-control" id="categoryImage">
			</div>
			<div class="form-group col-md-6">
				<img src="{{asset('./img/category/'.$category->categoryImage)}}" alt="" class="img_normal">
			</div>
		</div>
		<div class="form-group">
			<label for="categoryDesc">Category Description</label>
			<textarea name="categoryDesc" id="categoryDesc">{{$category->categoryDesc}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endforeach
@endsection