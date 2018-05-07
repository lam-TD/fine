@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">


	<section class="content-info">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-md-3 ">
						<div class="left-user">
							<div class="avatar">
								<img src="public/resource/images/avatar1.jpg" alt="">
								{{-- <h5 class="text-center">Lam The Men</h5> --}}
							</div>
							<div class="options">
								<ul>
									<li class="active"><a href=""><i class="far fa-edit"></i> Thông tin tài khoản</a></li>
									<li>
										<a href=""><i class="fas fa-lock"></i> Đổi mật khẩu</a>
									</li>
									<li>
										<a href=""><i class="fas fa-lock"></i> Điểm thưởng</a>
									</li>
									<li style="border-bottom: 1px solid #ddd;">
										<a href=""><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
									</li>
								</ul>
							</div>
						</div>	
					</div>
					<div class="col-md-9">
						<div class="right-user">
							<div class="info-account">
								<h4 class="text-center" style="margin-top: 10px;"><b>THÔNG TIN TÀI KHOẢN</b></h4>
								<form class="form-info">
									
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Họ và tên</label>
											<input type="text" class="form-control" id="" placeholder="Họ tên" value="{{$info->contact_name}}">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Email</label>
											<input type="email" class="form-control" id="" placeholder="Email" value="{{$info->contact_email_address}}">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Số điện thoại</label>
											<input type="text" class="form-control" id="" placeholder="Điện thoại" value="{{$info->contact_phone}}">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Website</label>
											<input type="text" class="form-control" id="" placeholder="Website" value="{{$info->contact_website}}">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="inputState">Địa chỉ</label>
											<input type="text" class="form-control" id="" placeholder="Địa chỉ"value="{{$info->contact_name}}">
										</div>
										<div class="form-group col-md-6">
											<label for="inputState">Ngôn ngữ</label>
											<select id="inputState" class="form-control">
												<option value="Việt Nam" selected>Việt Nam</option>
												<option value="Nước ngoài">Nước ngoài</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>






	<script src="public/resource/js/lightbox.min.js"></script>
	<script src="public/resource/js/detail-hotel.js"></script>
	<script src="public/resource/js/menu-style.js"></script>


@include('VietNamTour.header-footer.footer')