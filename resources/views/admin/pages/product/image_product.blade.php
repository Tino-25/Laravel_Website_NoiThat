@extends('admin.index')
@section('content')
<div class="container form--wrap">
	<!-- show -->
	<div class="grid_row">
		@foreach($productImages as $key => $img)
		<div class="gird_col">
			<img class="img_small" src="{{asset('/img/product/'.$img->image)}}" alt="">
			<br>
			<a class="image_delete__btn" href="{{URL::to('/delete-img/'.$img->idImg.'/idProduct/'.$img->idProduct)}}">Xóa</a>
			<input type="hidden" value="{{$img->idProduct}}" name="idProduct_img">
		</div>
		@endforeach
	</div>
	<br>
	<!-- form add -->
	<form action="{{URL::to('/add-image-action/'.$idProduct)}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="exampleFormControlFile1">Chọn ảnh để thêm</label>
			<input type="file" name="image_product" class="form-control-file" id="exampleFormControlFile1">
		</div>
		<button type="submit" class="btn btn-primary mb-2">Thêm hình ảnh</button>
	</form>
</div>
@endsection