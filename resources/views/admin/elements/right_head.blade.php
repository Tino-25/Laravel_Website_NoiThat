<div class="right_head">
	<i class="far fa-bell right_head--icon-bell"></i>
	<div class="right_head__content">
		<img src="{{asset('./admin/img/logo_giaphat.jpg')}}" alt="">
		<h6>
			<?php 
				if(Session::get('idUser_admin')!=null && Session::get('name_admin')!=null && Session::get('email_admin')!=null){
					echo Session::get('name_admin'); ?>
					<a title="Đăng xuất" href="{{URL::to('/logout_admin')}}"><i class="fas fa-sign-out-alt"></i></a>
				<?php }else{
					echo "Chưa login";
				}
			?>
		</h6>

	</div>
</div>