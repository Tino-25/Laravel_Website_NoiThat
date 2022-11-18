@extends('admin.index')
@section('content')
<div class="container form--wrap">
	<form action="{{URL::to('/add-product-action')}}" method="post">
		{{ csrf_field() }}
		<div class="form-row">
			<h2>Thêm sản phẩm</h2>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="category">Category Product</label>
				<select id="category" name="category" class="form-control">
					<option selected>Choose...</option>
					@foreach($all_category as $key => $cate)
					<option value="{{$cate->idCategoryProduct}}">
						{{$cate->idCategoryProduct}} - {{$cate->categoryName}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="size">Size</label>
				<select id="size" name="size" class="form-control">
					<option selected>Choose...</option>
					@foreach($all_size as $key => $size)
					<option value="{{$size->idSize}}">
						{{$size->idSize}} - {{$size->size}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="color">Color</label>
				<select id="color" name="color" class="form-control">
					<option selected>Choose...</option>
					@foreach($all_color as $key => $color)
					<option value="{{$color->idColor}}">
						{{$color->idColor}} - {{$color->color}}
					</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="nameproduct">Name Product</label>
				<input type="text" class="form-control" id="nameproduct" placeholder="Nhập tên sản phẩm" name="nameproduct">
			</div>
			<div class="form-group col-md-6">
				<label for="unitprice">Unit Price</label>
				<input type="text" class="form-control" id="unitprice" placeholder="Nhập đơn giá" name="unitprice">
			</div>
		</div>
		<div class="form-group">
			<label for="dateIn">Date In</label>
			<input type="text" name="dateIn" class="form-control" id="dateIn" placeholder="Ngày nhập hàng">
		</div>
		<div class="form-group">
			<!--<label for="desc">Description</label>
			<input type="text" name="desc" class="form-control" id="desc" placeholder="Mô tả sản phẩm" name="desc"> -->
			<label for="desc">Description</label>
			<textarea name="desc" cols="" rows="" id="desc"></textarea>
			<script type="text/javascript">
							CKEDITOR.replace('desc');
			</script>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
</div>
@endsection