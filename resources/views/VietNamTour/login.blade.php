<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="public/resource/css/bootstrap.css">
	<link rel="stylesheet" href="public/resource/css/login.css">
	<title>Login</title>
</head>
<body>
	<section class="content" style="background-image: url({{asset('/resource/images/background/4.jpg')}});">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>	
				<div class="col-md-4 form-login tada">
					<div class="title">
						<h3 class="text-center">Login</h3>
					</div>
					<div class="body">
						<form action="loginpost" method="post">
							<div class="login">
								<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
							</div>
							    @if(Session::has('erro'))
									<small style="color: red;">Tên tài khoản hoặc mật khẩu không đúng</small>
							    @endif

								<input id="txtuser" type="text" placeholder="Username" name="username" required="required" 
									value="@if(Session::has('userold')){{Session::get('userold')}}@endif">
								<input id="txtpass" type="password" placeholder="Password" name="password" required="required">
								<small id="thongbao" style="color: red; display: none;">Tên tài khoản hoặc mật khẩu không đúng</small>

								<a href="" style="font-size: 14px;width: 100%;display: inline-block;"><i>Quên mật khẩu</i></a>

								<button class="btn btn-success float-right btnlogin" type="" id="btnlogin">Login</button>
							</div>
							<div class="login-social">
								<h5 class="text-center">Login social</h5>
								<div class="row">
									<div class="col-md-6">
										<a href="{{route('loginfacebook')}}" class="btn btn-warning btnfacebook" style="background-color: #3b5999">Facebook</a>
									</div>
									<div class="col-md-6">
										<a href="" class="btn btn-warning btngoogle" style="background-color: #dd4b39">Google+</a>
									</div>
								</div>
							</div>
							<div class="register text-center">
								<h5 class="text-center">Đăng ký tài khoản mới tại đây</h5>
								<a href="{{route('registerW')}}" class="btn btn-info btnregister">Register</a>
							</div>
						</form>
					</div>
				</div>	
				<div class="col-md-4"></div>	
			</div>
		</div>
	</section>

	<script type="text/javascript" src="public/resource/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	<script src="public/resource/js/fontawesome-all.min.js" type="text/javascript"></script>
	<script src="public/resource/js/p/login.js" type="text/javascript"></script>
</body>
</html>