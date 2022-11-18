@extends('layout')
@section('content')
<div id="body_pay">
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="body-content">
					<div class="body-content__top">
						<h2>Đăng nhập</h2>
						<h6>
							<?php 
							if(Session::get('message') != null){
								echo Session::get('message');
								Session::put('message', null);
							}
							?>
						</h6>
					</div>
					<form action="{{URL::to('/login-user')}}" method="post" class="form_action">
						{{ csrf_field() }}
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" id="email">
							</div>
							<div class="form-group col-md-12">
								<label for="password">password</label>
								<input type="text" name="password" class="form-control" id="password">
							</div>
						</div>
						<button class="form__btn" type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
			<div class="col-3"></div>
		</div>
	</div>
</div>
@endsection