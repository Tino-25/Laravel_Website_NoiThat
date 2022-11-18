@extends('layout')
@section('content')
<div id="body_pay">
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="body-content">
					<div class="body-content__top">
						<h2>Đăng ký tài khoản</h2>
					</div>
					<form action="{{URL::to('/register-user')}}" method="post" class="form_action">
						{{ csrf_field() }}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="firstname">First name</label>
								<input type="firstname" name="firstname" class="form-control" id="firstname"
								placeholder="First name">
							</div>
							<div class="form-group col-md-6">
								<label for="lastname">Last name</label>
								<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label>
							<input type="text" name="address" class="form-control" id="inputAddress"
							placeholder="Nhập địa chỉ">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="sex">sex</label>
								<select class="form-control" name="sex">
									<option selected value="male">male</option>
									<option value="female">female</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="phone">Phone</label>
								<input type="text" name="phone" class="form-control" id="phone">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" id="email">
							</div>
							<div class="form-group col-md-6">
								<label for="password">password</label>
								<input type="text" name="password" class="form-control" id="password">
							</div>
						</div>
						<button class="form__btn" type="submit" class="btn btn-primary">Gửi</button>
					</form>
				</div>
			</div>
			<div class="col-3"></div>
		</div>
	</div>
</div>
@endsection