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
						<form action="{{route('loginpost')}}" method="post">
							<div class="login">
								<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
							</div>

								@if (count($errors) > 0)
					              @foreach ($errors->all() as $error)
					                  <small class="float-left" style="color: red;">{{ $error }}</small>
					              @endforeach
							    @elseif(Session::has('erro'))
									<small style="color: red;">Tên tài khoản hoặc mật khẩu không đúng</small>
							    @endif

								<input type="text" placeholder="Username..." name="username" required="required" 
									value="">
								<input type="password" placeholder="Password..." name="password" required="required">
								<a href="" style="font-size: 14px;width: 100%;display: inline-block;"><i>Quên mật khẩu</i></a>
								<button class="btn btn-success float-right btnlogin" type="submit">Login</button>
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
</body>
</html>