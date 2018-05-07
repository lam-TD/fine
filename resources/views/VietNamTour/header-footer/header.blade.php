<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VietNamTravel</title>
	<base href="{{asset('')}}">

	<script type="text/javascript" src="public/resource/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="public/resource/js/popper.js"></script>
	<script type="text/javascript" src="public/resource/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/resource/js/fontawesome-all.min.js"></script>
	<script type="text/javascript" src="public/resource/js/fa-regular.js"></script>
	
	<link rel="stylesheet" href="public/resource/lightbox/styles.min.css">
	<link rel="stylesheet" href="public/resource/lightbox/fluidbox.min.css">

	<link rel="stylesheet" href="public/resource/css/bootstrap.css">
	<link rel="stylesheet" href="public/resource/css/owl.carousel.min.css">
	<link rel="stylesheet" href="public/resource/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="public/resource/css/place.css">
	<link rel="stylesheet" href="public/resource/css/style.index.css">
	<link rel="stylesheet" href="public/resource/css/menu-style2.css">
	<link rel="stylesheet" href="public/resource/css/select2.min.css">
	<style>
		h4{
			border-bottom: none !important;
		}
	</style>
</head>
<body>
	
	<!-- ========== icon =========== -->
	<div class="icon-bar">
		<ul>
			<li class="search">
				<a href="###">
					<div class="icon"><i class="fas fa-mobile-alt"></i></div>
					<div class="slider">
						<p>Search</p>
					</div>
				</a>
			</li>
			<li class="facebook">
				<a href="#">
					<div class="icon"><i class="fab fa-facebook-f"></i></div>
					<div class="slider">
						<p>Facebook</p>
					</div>
				</a>
			</li>
			<li class="google">
				<a href="#">
					<div class="icon"><i class="fab fa-google-plus-g"></i></div>
					<div class="slider">
						<p>Google</p>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<div class="icon-scroll-top" id="id-icon-scroll-top"><a><i class="fas fa-arrow-up"></i></a></div>
	<!-- ========== end icon =========== -->

	<!-- ================== header ============= -->
	<section class="header">
		<div class="img-carolsel">
			<ul>
				<li class="active-img">
					<div class="img-item">
						<div class="img-content" style="background-image: url('public/resource/images/slide-carousel/slide1.jpg');"></div>
					</div>
				</li>
				<li>
					<div class="img-item">
						<div class="img-content" style="background-image: url('public/resource/images/slide-carousel/slide2.jpg');"></div>
					</div>
				</li>
				<li >
					<div class="img-item">
						<div class="img-content" style="background-image: url('public/resource/images/slide-carousel/slide3.jpg');"></div>
					</div>
				</li>
			</ul>
			<div class="noidung-text">
				
			</div>	
		</div> <!-- end img-carolsel -->
		<div class="container">
			<div class="layer-top" id="id-layer-top">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light menuTop" id="id-menu-Top">
						<a class="navbar-brand" href="{{route('/')}}" style="color: #304FFE !important;"><!-- VietNamTour -->
							<img src="https://static.tacdn.com/img2/langs/vi/branding/rebrand/TA_logo_primary_v2.svg" alt="" style="height: 50px; width: 160px;">
						</a>
						<!-- <button class="btn btn-success navbar-toggler" id="btnsearch-xs"><i class="fas fa-search"></i></button> -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: white; background-color: white;">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto col-md-9 col-12" style="padding: 0;">
								<li class="nav-item btn-select" >
									<a id="a-tinhTP" class="nav-link a-select" data-hienthi="tinhTP" data-id="all" data-name="Tất cả">Tất cả 
										<i class="fas fa-angle-down float-right" style="margin-top: 5px;"></i>
									</a>

									<div class="select-content" id="tinhTP">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Tỉnh thành phố</h5>
						  				</div>

						  				<ul id="content-tinhtp-id">
						  					
						  				</ul>
									</div>
									
									

								</li> <!-- end btn-select -->
								<li class="nav-item btn-select">
									<a id="a-danhmuc" class="nav-link a-select" data-hienthi="danhmuc" title="" data-type="all" data-name="Tất cả">
										Tất cả 
										<i class="fas fa-angle-down float-right" style="margin-top: 5px;"></i>
									</a>
									<div class="select-content" id="danhmuc" style="height: 158px;">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Danh mục</h5>
						  				</div>

						  				<ul style="height: 125px;">
						  					<li class="selectItem2" data-name="Tất cả" data-type="all">
						  						<a class="selectItem-name2">
						  							<label>Tất cả</label>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Tham quan" data-type="4">
						  						<a class="selectItem-name2">
						  							<label>Tham quan</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Ăn uống" data-type="1">
						  						<a class="selectItem-name2">
						  							<label>Ăn uống</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Khách sạn" data-type="2">
						  						<a class="selectItem-name2">
						  							<label>Khách sạn</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Vui chơi" data-type="5">
						  						<a class="selectItem-name2">
						  							<label>Vui chơi</label>
						  							
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Phương tiện" data-type="3">
						  						<a class="selectItem-name2">
						  							<label>Phương tiện</label>
						  							
						  						</a>
						  					</li>
						  				</ul>
									</div>
								</li><!-- end btn-select -->

								<li class="nav-item" style="position: relative;">
									<form class="form-inline form-search">
										<label class="boloc"><i class="fas fa-search"></i></label>
										<input id="text-search-top" class="form-control input-search" type="search" placeholder="Search" aria-label="Search" onekeyup="search()">
										<button class="btn btn-outline-success btn-search" type="submit" style="background-color: #00a680;">Tìm kiếm</button>
									</form>
									<div class="body-search" id="thanSearch">
										<div class="item-search" id="IDitem-search">
											<div id="eatCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchEat"></h5>
												</div>
												<div id="search_eat">
													{{-- hotel --}}
												</div>
											</div>	

											<div id="hotelCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchHotel"></h5>
												</div>
												<div id="search_hotel">
													{{-- hotel --}}
												</div>
											</div>	
											
											<div id="tranCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchTran"></h5>
												</div>
												<div id="search_tran">
													{{-- hotel --}}
												</div>
											</div>	

											<div id="seeCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchSee"></h5>
												</div>
												<div id="search_see">
													{{-- hotel --}}
												</div>
											</div>	

											<div id="enterCha" style="display: none;">
												<div class="title-search">
													<h5 id="tieudeSearchEnter"></h5>
												</div>
												<div id="search_enter">
													{{-- hotel --}}
												</div>
											</div>
											
										</div>

										<div class="item-search">
											{{-- <div class="title-search">
												<h5>Lịch sử tìm kiếm</h5>
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div> --}}
										</div>
									</div>
								</li>
							</ul>
							<div class="form-inline my-2 my-lg-0" id="dangnhap-dangky">
								<ul class="navbar-nav mr-auto col-md-12 col-12" style="padding: 0;">
									@if(Session::has('login') && Session::get('login') == true)
									<li class="nav-item" style="position: relative; margin-right: 2px;">
											<!-- hien thi khi dang nhap thanh cong -->
											<a class="nav-link btn-login" style="padding: 0; border: none !important;" id="id-user-form">
												<img src="public/resource/images/avatar1.jpg" alt="" style="height: 33px; width: 33px;">
												{{Session::get('user_info')->username}} <i class="fas fa-caret-down"></i>
											</a>
											<div class="user-form">
												<ul>
													<li><a href="{{route('info')}}"><i class="fas fa-info-circle"></i> Thông tin tài khoản</a></li>
													<li><a href=""><i class="fas fa-book"></i> Góp ý</a></li>
													<li><a href="{{route('logoutW')}}"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
												</ul>
											</div> <!-- end hien thi khi dang nhap thanh cong -->
											<a href="{{route('loginW')}}" class="nav-link btn-login hidden" id="btn-dangnhap">Đăng nhập</a>
									</li>
									@else
										<li class="nav-item">
											<a href="{{route('loginW')}}" class="nav-link btn-login" id="btn-dangnhap">Đăng nhập</a>
										</li>
										<li class="nav-item">
											<a href="{{route('registerW')}}" class="nav-link btn-login" id="btn-dangky">Đăng ký</a>
										</li>
									@endif
								</ul>
							</div>
						</div>
					</nav>
					<div class="con" id="id-con">
						<div class="row">
							<div class="col-md-10 col-6">
								<div class="right-menu-lam">
									<ul class="float-left ul-right-menu-lam">
										<li class=""><a href="" style="color: #00a680 !important;"><i class="fas fa-home"></i></a></li>
										<li class="hover-menu hidden-xs"><a href="">Địa điểm</a></li>
										{{-- <li class="hover-menu hidden-xs"><a href="">Bài viết</a></li> --}}
										<li class="hover-menu hidden-xs"><a href="">Liên hệ</a></li>
										{{-- <li class="hover-menu">
											<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 14px !important;">
											  </a>
											  <div class="dropdown-menu">
											    <a class="dropdown-item" href="####">Action</a>
											    <a class="dropdown-item" href="#">Another action</a>
											    <a class="dropdown-item" href="#">Something else here</a>
											    <div class="dropdown-divider"></div>
											    <a class="dropdown-item" href="#">Separated link</a>
											  </div>
										</li> --}}
									</ul>
										
								</div>
							</div>
							<div class="col-md-5 d-none">
								<div class="ssearch" id="hidden-formSearch" style="position: relative; display: none; transition: 0.5s; margin-top: -2px;">
									
								</div>
							</div>
							<div class="col-md-2 col-6">
								<ul class="float-right left-menu-lam">
									<li class="cha-notification">
										<a id="athongbao" class="a-notification" data-id-hienthi="id-thongBao">
											<!-- <i class="fas fa-bell"></i> -->
											<i class="far fa-bell"></i>
											<!-- <img src="images/bell.svg" alt="" style="width: 14px;height: 16px;"> -->
											<span class="badge" id="num-thongbao">9</span>
										</a>
										<div class="notification" id="id-thongBao">
											<div class="title-nofi">
												<h6 class="text-center" style="padding: 0; font-weight: 700;">Thông báo</h6>
											</div>
											<div class="content-nofi" id="noidungthongbao">
												<ul id="body-nofi">
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
												</ul>
											</div>
											<div class="xem text-center" style="background-color: #ddd;">
												<a href="" style="color: black !important; font-size: 13px; padding: 5px; font-weight: 500; display: inline-block;">
													Xem tất cả
												</a>
											</div>
										</div>
									</li>
									<li class="cha-notification">
										<a class="a-notification" data-id-hienthi="id-tuychinh"><i class="fas fa-plus"></i></a>
										<div class="notification" id="id-tuychinh" style="width: 200px;">
											{{-- <div class="title-nofi">
												<h6 class="text-center" style="padding: 0; font-weight: 700;">Thông báo</h6>
											</div> --}}
											<div class="content-nofi">
												<ul id="body-nofi" style="width: 200px;">
													<li style="height: 27px;">
														<a href="{{route('addplace')}}" class="a-content-nofi">
															<p class="text-nofi" style="height: auto;width: auto;">
																<i class="fas fa-map-marker"></i> 
																Thêm địa điểm
															</p>	
														</a>
													</li>
													<li style="height: 27px;">
														<a href="" class="a-content-nofi">
															<p class="text-nofi" style="height: auto;width: auto;">
																<i class="fas fa-archive"></i> 
																Thêm Dịch vụ
															</p>	
														</a>
													</li>
													<li style="height: 27px;">
														<a href="" class="a-content-nofi">
															<p class="text-nofi" style="height: auto;width: auto;">
																<i class="fas fa-archive"></i> 
																Lịch trình
															</p>	
														</a>
													</li>
													<li style="height: 27px;">
														<a href="" class="a-content-nofi">
															<p class="text-nofi" style="height: auto;width: auto;">
																<i class="fas fa-bomb"></i> 
																Góp ý
															</p>	
														</a>
													</li>
													<li style="height: 27px;">
														<a href="" class="a-content-nofi">
															<p class="text-nofi" style="height: auto;width: auto;">
																<i class="fas fa-cogs"></i> 
																Cài đặt
															</p>	
														</a>
													</li>
													
												</ul>
											</div>
										</div>
									</li>
									<li id="id-language">
										<a href="" id="language">
											<img src="public/resource/images/icons/vn.png" alt="" style="width: 20px; height: 20px;">
										</a>
										  <div class="" id="content-language">
										    <a class="" href="####">
										    	<img src="public/resource/images/icons/us.png" alt="" style="width: 20px; height: 20px;">
										    </a>
										  </div>
									</li>
								</ul>
							</div>
						</div>
							
					</div>
				</div>	
			</div> <!-- end layer-top -->
		</div>
	</section>
	<!-- ================== end header ============= -->

<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>
