@extends('admin.index')
@section('content')
<div class="container form--wrap">
	<form action="{{URL::to('/user-add-action')}}" method="post">
        {{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Thêm người dùng</h3>
			</div>
			<div class="form-group col-md-6">
				<label for="inputState">Division - phân công</label>
				<select id="inputState" name="division" class="form-control">
					<option selected>--chose---</option>
					@foreach($all_division as $key=>$division)
						<option value="{{$division->idDivision}}">
							{{$division->divisionName}} - {{$division->idDivision}}
						</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="lastName">lastName</label>
				<input type="lastName" name="lastName" class="form-control" id="lastName" placeholder="lastName">
			</div>
			<div class="form-group col-md-6">
				<label for="firstName">firstName</label>
				<input type="text" name="firstName" class="form-control" id="firstName" placeholder="firstName">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Password</label>
				<input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Address</label>
			<input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="Sex">Sex</label>
				<input type="text" name="sex" class="form-control" id="Sex">
			</div>
			<div class="form-group col-md-4">
				<label for="Phone">Phone</label>
				<input type="text" name="phone" class="form-control" id="Phone">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
</div>
@endsection