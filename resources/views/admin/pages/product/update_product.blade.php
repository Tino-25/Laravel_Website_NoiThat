@extends('admin.index')
@section('content')
@foreach($product_detail as $key => $detail)
<div class="container form--wrap">
	<form action="{{URL::to('/update-product-action/'.$detail->idProduct)}}" method="post">
		{{ csrf_field() }}
		<div class="form-row">
			<h2>Chi tiết sản phẩm</h2>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="category">Category Product</label>
				<select id="category" name="category" class="form-control">
					@foreach($all_category as $key => $cate)
						<?php if($detail->categoryName == $cate->categoryName) { ?>
							<option <?php echo "selected";?> value="{{$cate->idCategoryProduct}}">
								{{$cate->categoryName}}
							</option>
						<?php }else{ ?>
							<option value="{{$cate->idCategoryProduct}}">
								{{$cate->categoryName}}
							</option>
						<?php } ?>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="size">Size</label>
				<select id="size" name="size" class="form-control">
					@foreach($all_size as $key => $size)
						<?php if($detail->size == $size->size) { ?>
							<option <?php echo "selected";?> value="{{$size->idSize}}">
								{{$size->size}}
							</option>
						<?php }else{ ?>
							<option value="{{$size->idSize}}">
								{{$size->size}}
							</option>
						<?php } ?>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="color">Color</label>
				<select id="color" name="color" class="form-control">
					@foreach($all_color as $key => $color)
						<?php if($detail->color == $color->color) { ?>
							<option <?php echo "selected";?> value="{{$color->idColor}}">
								{{$color->color}}
							</option>
						<?php }else{ ?>
							<option value="{{$color->idColor}}">
								{{$color->color}}
							</option>
						<?php } ?>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="nameproduct">Name Product</label>
				<input type="text" class="form-control" id="nameproduct" placeholder="Nhập tên sản phẩm" name="nameproduct" value="{{$detail->productName}}">
			</div>
			<div class="form-group col-md-6">
				<label for="unitprice">Unit Price</label>
				<input type="text" class="form-control" id="unitprice" placeholder="Nhập đơn giá" name="unitprice" value="{{$detail->productUnitPrice}}">
			</div>
		</div>
		<div class="form-group">
			<label for="dateIn">Date In</label>
			<input type="text" name="dateIn" class="form-control" id="dateIn" placeholder="Ngày nhập hàng" value="{{$detail->dateIn}}">
		</div>
		<div class="form-group">
			<!-- <label for="desc">Description</label>
			<input type="text" name="desc" class="form-control" id="desc" placeholder="Mô tả sản phẩm" name="desc" value="{{$detail->productDescription}}"> -->
			<label for="desc">Description</label>
			<textarea name="desc" cols="" rows="" id="desc">{{$detail->productDescription}}</textarea>
			<script type="text/javascript">
							CKEDITOR.replace('desc');
			</script>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
</div>
@endforeach
@endsection