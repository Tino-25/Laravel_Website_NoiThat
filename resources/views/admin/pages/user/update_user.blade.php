@extends('admin.index')
@section('content')
@foreach($detailsUser as $key => $user)
<div class="container form--wrap">
	<form action="{{URL::to('/user-update-action/'.$user->idUser)}}" method="post">
        {{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Sửa thông tin người dùng</h3>
			</div>
			<div class="form-group col-md-6">
				<label for="inputState">Division - phân công</label>
				<select id="inputState" name="division" class="form-control">
					@foreach($all_division as $key => $division)
						<?php 
							if($user->idDivision == $division->idDivision){
						?>
							<option <?php echo "selected"; ?> value="{{$division->idDivision}}">
								{{$division->divisionName}} - {{$division->idDivision}}
							</option>
						<?php }else{ ?>
							<option value="{{$division->idDivision}}">
								{{$division->divisionName}} - {{$division->idDivision}}
							</option>
						<?php } ?>
						
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="lastName">lastName</label>
				<input type="lastName" name="lastName" class="form-control" id="lastName" placeholder="lastName" value="{{$user->lastName}}">
			</div>
			<div class="form-group col-md-6">
				<label for="firstName">firstName</label>
				<input type="text" name="firstName" class="form-control" id="firstName" placeholder="firstName" value="{{$user->firstName}}">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{$user->email}}">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Password</label>
				<input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" value="{{$user->password}}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Address</label>
			<input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{$user->address}}">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="Sex">Sex</label>
				<input type="text" name="sex" class="form-control" id="Sex" value="{{$user->sex}}">
			</div>
			<div class="form-group col-md-4">
				<label for="Phone">Phone</label>
				<input type="text" name="phone" class="form-control" id="Phone" value="{{$user->phone}}">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Sửa</button>
	</form>
</div>

@endforeach
@endsection