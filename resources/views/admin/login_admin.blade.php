<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login admin</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
	integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Css -->
	<link rel="stylesheet" href="{{asset('./admin/css/base.css')}}">
	<link rel="stylesheet" href="{{asset('./admin/css/main.css')}}">
</head>
<body>
	
	<div id="body_login_admin">
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
						<form action="{{URL::to('/login-admin')}}" method="post" class="form_action">
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
							<button type="submit" class="form__btn btn btn-primary btn-login-admin">Login</button>
						</form>
					</div>
				</div>
				<div class="col-3"></div>
			</div>
		</div>
	</div>
</body>
</html>