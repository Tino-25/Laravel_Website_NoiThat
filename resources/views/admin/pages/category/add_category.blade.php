@extends('admin.index')
@section('content')
<div class="container form--wrap">
	<form action="{{URL::to('/add-category-action')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Thêm loại sản phẩm</h3>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="categoryName">Name Category</label>
				<input type="lastName" name="categoryName" class="form-control" id="categoryName" placeholder="categoryName">
			</div>
		</div>		
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="categoryImage">Image Category</label>
				<input type="file" name="categoryImage" class="form-control" id="categoryImage">
			</div>
		</div>
		<div class="form-group">
			<label for="categoryDesc">Category Description</label>
			<textarea name="categoryDesc" id="categoryDesc"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
</div>
@endsection