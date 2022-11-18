@extends('admin.index')
@section('content')
<div class="container">
	<div class="title_top">
		<span>Quản lý user</span>
	</div>
	<a href="{{URL::to('/user-add')}}" class="btn_add">thêm user</a>
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th scope="col">#id</th>
				<th scope="col">Fullname</th>
				<th scope="col">address</th>
				<th scope="col">Sex</th>
				<th scope="col">Phone</th>
				<th scope="col">Division</th>
				<th scope="col">Account</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($all_user as $key => $user)
			<tr>
				<th scope="row">{{$user->idUser}}</th>
				<td>{{$user->lastName}} {{$user->firstName}}</td>
				<td>{{$user->address}}</td>
				<td>{{$user->sex}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->idDivision}}</td>
				<td>
					Email: {{$user->email}}
					<br>
					Password: {{$user->password}}
				</td>
				<td>
					<a href="{{URL::to('/user-details/'.$user->idUser)}}">Xem chi tiết</a>
					<br>
					<a href="{{URL::to('/user-delete/'.$user->idUser)}}">Xóa</a>
					<br>
					<a href="{{URL::to('/user-update/'.$user->idUser)}}">Sửa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection