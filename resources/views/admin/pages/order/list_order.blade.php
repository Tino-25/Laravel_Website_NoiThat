@extends('admin.index')
@section('content')
<div class="container">
	<div class="title_top">
	<span>Quản lý hóa đơn</span>
</div>
<table class="table">
	<thead class="thead-light">
		<tr>
			<th scope="col">#id</th>
			<th scope="col">idUser</th>
			<th scope="col">dateOrder</th>
			<th scope="col">statusOrder</th> <!-- 0 là chưa duyệt đơn hàng, 1 là duyệt rồi  -->
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($all_order as $key => $order)
			<tr>
				<th scope="row">{{$order->idOrder}}</th>
				<td>{{$order->lastName}}</td>
				<td>{{$order->dateOrder}}</td>
				<td>
					<?php if($order->statusOrder == 0) { ?>
						<a href="{{URL::to('/update_status_order_1/'.$order->idOrder)}}">
							Hóa Đơn chưa duyệt
						</a>
					<?php }elseif($order->statusOrder == 1){  ?>
						<a href="{{URL::to('/update_status_order_0/'.$order->idOrder)}}">
							Hóa đơn đã duyệt
						</a>
					<?php }else{
							echo "Không xác định";
						}
					?>
				</td>
				<td>
					<a href="{{URL::to('/detail_order/'.$order->idOrder)}}">Xem chi tiết</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection