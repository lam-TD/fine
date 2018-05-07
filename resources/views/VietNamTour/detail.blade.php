<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="{{asset('')}}">
	<script type="text/javascript" src="resource/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="resource/js/bootstrap.js"></script>
	<script src="resource/js/fontawesome-all.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="resource/css/bootstrap.css">
	<link rel="stylesheet" href="resource/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="resource/css/menu-style.css">
	<link rel="stylesheet" href="resource/css/hotel.css">
	<link rel="stylesheet" href="resource/css/hotel-detail.css">
	<link rel="stylesheet" href="resource/css/lightbox.min.css">
</head>
<body>
	<!-- ========== icon =========== -->
	<div class="icon-bar">
		<ul>
			<li class="search">
				<a href="###">
					<div class="icon"><i class="fas fa-search"></i></div>
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
						<div class="img-content" style="background-image: url('/VietNamTour/images/background/3.jpg');"></div>
					</div>
				</li>
				<li>
					<div class="img-item">
						<div class="img-content" style="background-image: url('../VietNamTour/images/background/2.jpg');"></div>
					</div>
				</li>
				<li >
					<div class="img-item">
						<div class="img-content" style="background-image: url('../VietNamTour/images/background/1.jpg');"></div>
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
						<a class="navbar-brand" href="#">VietNamTour</a>
						<!-- <button class="btn btn-success navbar-toggler" id="btnsearch-xs"><i class="fas fa-search"></i></button> -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: white; background-color: white;">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item btn-select" >
									<a id="a-tinhTP" class="nav-link a-select" data-hienthi="tinhTP" href="#">Cần Thơ <i class="fas fa-angle-down"></i></a>

									<div class="select-content" id="tinhTP">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Tỉnh thành phố</h5>
						  				</div>

						  				<ul>
						  					<li class="selectItem" data-name="Cần Thơ">
						  						<a href="https://www.google.com.vn" class="selectItem-name">
						  							<label>Cần Thơ</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem" data-name="HCM">
						  						<a href="https://www.google.com.vn" class="selectItem-name">
						  							<label>HCM</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem" data-name="Hà Nội">
						  						<a href="https://www.google.com.vn" class="selectItem-name">
						  							<label>Hà Nội</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  				</ul>
									</div>
								</li> <!-- end btn-select -->
								<li class="nav-item btn-select">
									<a id="a-danhmuc" class="nav-link a-select" data-hienthi="danhmuc" href="#">Tham quan <i class="fas fa-angle-down"></i></a>
									<div class="select-content" id="danhmuc">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Danh mục</h5>
						  				</div>

						  				<ul>
						  					<li class="selectItem2" data-name="Cân Thơ">
						  						<a href="" class="selectItem-name2">
						  							<label>Tham quan</label>
						  							<span class="float-right">1234</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="HCM">
						  						<a href="" class="selectItem-name2">
						  							<label>Ăn uống</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Hà Nội">
						  						<a href="" class="selectItem-name2">
						  							<label>Khách sạn</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Hà Nội">
						  						<a href="" class="selectItem-name2">
						  							<label>Vui chơi</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Hà Nội">
						  						<a href="" class="selectItem-name2">
						  							<label>Phương tiện</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  				</ul>
									</div>
								</li><!-- end btn-select -->
								<li class="nav-item hidden-xs" style="position: relative;">
									<form class="form-inline form-search">
										<label class="boloc"><i class="fas fa-search"></i></label>
										<input id="text-search-top" class="form-control input-search" type="search" placeholder="Search" aria-label="Search">
										<button class="btn btn-outline-success btn-search" type="submit">Tìm kiếm</button>
									</form>
									<div class="body-search">
										<div class="item-search">
											<div class="title-search">
												<h5>Từ khóa tìm kiếm nhiều nhất</h5>
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
											</div>
										</div>

										<div class="item-search">
											<div class="title-search">
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
											</div>
										</div>
									</div>
								</li>
							</ul>
							<div class="form-inline my-2 my-lg-0" id="dangnhap-dangky">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item" style="position: relative;">
										<a href="login.html" class="nav-link btn-login" id="btn-dangnhap">Đăng nhập</a>
										<!-- hien thi khi dang nhap thanh cong -->
										<a class="nav-link btn-login d-none" style="padding: 0; border: none !important;" id="id-user-form">
											<img src="images/avatar1.jpg" alt="" style="height: 33px; width: 33px;">
											lamthemen <i class="fas fa-caret-down"></i>
										</a>
										<div class="user-form">
											<ul>
												<li><a href=""><i class="fas fa-info-circle"></i> Thông tin tài khoản</a></li>
												<li><a href=""><i class="fas fa-book"></i> Góp ý</a></li>
												<li><a href=""><i class="fas fa-power-off"></i> Đăng xuất</a></li>
											</ul>
										</div> <!-- end hien thi khi dang nhap thanh cong -->
									</li>
									

									<li class="nav-item"><a href="register.html" class="nav-link btn-login" id="btn-dangky">Đăng ký</a></li>
									
								</ul>
							</div>
						</div>
					</nav>
					<div class="con" id="id-con">
						<div class="row">
							<div class="col-md-5 col-8">
								<div class="right-menu-lam">
									<ul class="float-left ul-right-menu-lam">
										<li class="active-menu"><a href=""><i class="fas fa-home"></i></a></li>
										<li class="hover-menu"><a href="">Địa điểm</a></li>
										<li class="hover-menu"><a href="">Bài viết</a></li>
										<li class="hover-menu"><a href="">Liên hệ</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-5 hidden-xs">
								<div class="ssearch" id="hidden-formSearch" style="position: relative; display: none; transition: 0.5s; margin-top: -2px;">
									<form action="" class="form-search-menu">
										<label class="boloc2"><i class="fas fa-search"></i></label>
										<input type="text" class="input-search2" id="text-search-top-2">
										<button class="btn-search2">Tìm kiếm</button>
									</form>
									<div class="body-search" style="top: 48px; left: 20px;">
										<div class="item-search">
											<div class="title-search">
												<h5>Từ khóa tìm kiếm nhiều nhất 2</h5>
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
											</div>
										</div>

										<div class="item-search">
											<div class="title-search">
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
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-4">
								<ul class="float-right left-menu-lam">
									<li class="cha-notification">
										<a class="a-notification active-thongbao" data-id-hienthi="id-thongBao"><i class="fas fa-bell"></i></a>
										<div class="notification" id="id-thongBao">
											<div class="title-nofi">
												<h6 class="text-center" style="padding: 0; font-weight: 700;">Thông báo</h6>
											</div>
											<div class="content-nofi">
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
											<div class="xem text-center">
												<a href="" style="color: black !important; font-size: 13px; padding: 5px; font-weight: 700;">
													Xem tất cả
												</a>
											</div>
										</div>
									</li>
									<li class="cha-notification">
										<a class="a-notification" data-id-hienthi="id-tuychinh"><i class="fas fa-plus"></i></a>
										<div class="notification" id="id-tuychinh">
											<div class="title-nofi">
												<h6 class="text-center" style="padding: 0; font-weight: 700;">Thông báo</h6>
											</div>
											<div class="content-nofi">
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
											<div class="xem text-center">
												<a href="" style="color: black !important; font-size: 13px; padding: 5px; font-weight: 700;">
													Xem tất cả
												</a>
											</div>
										</div>
									</li>
									<!-- <li><a href=""><img src="images/icons/vn.png" alt="" style="width: 20px; height: 20px;"></a></li> -->
								</ul>
							</div>
						</div>
							
					</div>
				</div>	
			</div> <!-- end layer-top -->
		</div>
	</section>
	<!-- ================== end header ============= -->

	<section class="content-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-7" style="padding-right: 0;">
					<div class="hotel-detail-left">
						<div class="accordian">
							<ul>
								<li>
									<a>
										<img src="thumbnails/{{$detailServices->image_details_1}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="thumbnails/{{$detailServices->image_details_1}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="thumbnails/{{$detailServices->image_details_1}}"/>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-5" style="padding-left: 0;">
					<div class="hotel-detail-right">
						<div class="title" style="text-align: left; margin-bottom: 5px;">
							<p><a>Cần Thơ</a> >> <a>Quận Ninh Kiều</a></p>
							<h4 style="font-size: 20px;">
								@if($detailServices->sv_types == 2)
									{{$detailServices->hotel_name}}
								@elseif($detailServices->sv_types == 1)
									{{$detailServices->eat_name}}
								@elseif($detailServices->sv_types == 3)
									{{$detailServices->transport_name}}
								@elseif($detailServices->sv_types == 4)
									{{$detailServices->sightseeing_name}}
								@else
									{{$detailServices->entertainments_name}}
								@endif
							</h4>
							<div class="star">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<span style="color: black">
									@if($detailServices->sv_types == 2)
										Khách sạn
									@elseif($detailServices->sv_types == 1)
										Ăn uống
									@elseif($detailServices->sv_types == 3)
										Phương tiện
									@elseif($detailServices->sv_types == 4)
										Tham quan
									@else
										Vui chơi
									@endif
								</span>
							</div>
						</div>
						<div class="hotel-body">
							<p style="margin: 0;">{{$detailServices->sv_description}}</p>
							<div class="row">
								<div class="col-md-4 text-center">
									<a href="">Đánh giá</a>
									<div class="danhgia">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
								</div>
								<div class="col-md-4 text-center"><a href="" title="Chia sẻ"><i class="fas fa-share-alt"></i> Chia sẻ</a></div>
								<div class="col-md-4 text-center"><a id="like01"><i id="color-like" class="fas fa-heart"></i></a></div>
							</div>
							<div class="service">
								<ul>
									<li>
										<div class="icon-f"><i class="fas fa-paper-plane"></i></div>
										   Lê Lợi, Lô E1, Cồn Cái Khế, P. Cái Khế, Q.Ninh Kiều, Quận Ninh Kiều
									</li>
									<li><div class="icon-f"><i class="fas fa-phone"></i></div>{{$detailServices->sv_phone_number}}</li>
									<li><div class="icon-f"><i class="far fa-clock"></i></div>{{$detailServices->sv_open}} <i class="fas fa-arrow-right"></i> {{$detailServices->sv_close}}</li>
									<li><div class="icon-f"><i class="fas fa-tag"></i></div>{{$detailServices->sv_lowest_price}} <i class="fas fa-arrow-right"></i> {{$detailServices->sv_highest_price}} </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="hotel-detail-info">
						<div class="btn-details">
							<div class="line-box"></div>
							<ul class="">
								<li>
									<a class="tablink active-detail" data-hienthi2="info1">
										<span><i class="icon-details fas fa-info"></i></span>
									</a>
								</li>
								<li>
									<a class="tablink" data-hienthi2="imageList1">
										<span><i class="far fa-images"></i></span>
									</a>
								</li>
								<li>
									<a class="tablink" data-hienthi2="comment1">
										<span><i class="fas fa-comments"></i></span>
									</a>
								</li>
								<li>
									<a class="tablink" data-hienthi2="map1">
										<span><i class="fas fa-map-marker-alt"></i></span>
									</a>
								</li>
							</ul>
							

						</div>

						<div class="">
							<div class="content-details">
								<div class="line-body"></div>
								<div class="cha-hotel">
									<div class="body-panel1 info-hotel active-content" id="info1">
										<div class="gioithieu">
											<h4 class="text-center" style="margin-top: 10px;">Giới thiệu</h4>
											<p style="font-size: 15px; margin: 0;padding: 10px 20px; text-align: justify;"> {{$detailServices->sv_description}}</p>
										</div>
										<div class="tiennghi">
											<h5 style="margin-left: 20px;">Tiện nghi</h5>
											<ul>
												<li><i class="fas fa-utensils"></i> <span class="tiennghi">Ăn sáng miễn phí</span></li>
												<li><i class="fas fa-wifi"></i> <span class="tiennghi">Internet miễn phí</span></li>
												<li><i class="fas fa-credit-card"></i> <span class="tiennghi">Trả thẻ</span></li>
												<li><i class="fas fa-bicycle"></i> <span class="tiennghi">Giữ xe miễn phí</span></li>
											</ul>
										</div>
										<div class="anhnoibat">
											<h5 style="margin-left: 20px;">Một số hình ảnh nổi bật</h5>
											<div class="list-images">
												<div class="row cha-item-image">
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/hotel-background.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/hotel-background.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
												</div>
											</div>
										</div>
											
										
									</div>
									<div class="body-panel1 image-list-hotel" id="imageList1">
										<div class="anhnoibat">
											<h5 style="margin-left: 20px; margin-top: 10px;">Một số hình ảnh nổi bật</h5>
											<div class="list-images">
												<div class="row cha-item-image">
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/hotel-background.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/hotel-background.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" style="padding: 0px 25px;">
														<a class="btn btn-info" style="width: 100%; color: white; font-weight: 500; margin-top: 10px; margin-bottom: 30px;border-radius: 0;">Xem thêm hình ảnh</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="body-panel1 comment-hotel" id="comment1">
										comment
									</div>
									<div class="body-panel1 map-hotel" id="map1">
										map
									</div>
								</div>		
							</div>
						</div>

						
					</div>
				</div>
				<div class="col-md-4" style="padding-left: 0;">
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Nhà hàng/cafe lân cận</h5>
						</div>
						<div class="body-right-content">
							{{-- {{$dem = 0}} --}}
							{{-- @foreach($services as $se) --}}
								<div class="item-cafe">
									<ul>
										<li>
											<a href="">
												<img src="resource/images/hotel/3.jpg" alt="">
												<div class="text-item-cafe">
													<h6>Nhà hàng</h6>
													<p>31 Lê lợi...csccscsdc</p>
												</div>
											</a>
										</li>
									</ul>
								</div>
								{{-- {{$dem++}}
								@if($dem > 4)
									break
								@endif --}}
							{{-- @endforeach --}}
						</div>
					</div>	
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Vui chơi lân cận</h5>
						</div>
						<div class="body-right-content">
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/3.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sảnadadd adada dadfafdgaddfadssadahdafgdfahdfasd</h6>
												<p>31 Lê lợi...csccscsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/1.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sản</h6>
												<p>31 Lê lợi...cscsdcdcdcsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/2.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sản</h6>
												<p>31 Lê lợi...fsf sf dsf sfs fs dfsd fs fsd fsd fdsf f sdf da dad ad adda ssad asd adaad ad adas  dad ad ada da da da da d da da da da da da da da da dsa d d</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/3.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sảnadadd adada dadfafdgaddfadssadahdafgdfahdfasd</h6>
												<p>31 Lê lợi...csccscsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/1.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sản</h6>
												<p>31 Lê lợi...cscsdcdcdcsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<!-- ================== FOOTER ============= -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-12 col-12">
					<p style="text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
					<div class="address">
						<i class="fas fa-map-marker"></i>
						<span>1234 Vo Van Kiet CanTho</span>
					</div>
					<div class="address">
						<i class="fas fa-phone"></i>
						<span>0939 789 999</span>
					</div>
					<div class="address">
						<i class="fas fa-envelope"></i>
						<span>vietnamtravel@gmail.com</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-12">
					<div class="footer-text">
						<h3>Information</h3>
						<ul>
							<li><a href="#">Introduction</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Terms and Conditions</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Gop y</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-12">
					<div class="footer-text">
						<h3>Connect</h3>
						<ul>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Instagram</a></li>
							<li><a href="#">Google</a></li>
							<li><a href="#">Twitter</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-12">
					<div class="footer-text">
						<h3>Information</h3>
						<ul>
							<li><a href="#">Introduction</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Terms and Conditions</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- ================== END FOOTER ============= -->
	<script src="resource/js/lightbox.min.js"></script>
	<script src="resource/js/detail-hotel.js"></script>
	<script src="resource/js/menu-style.js"></script>

</body>
</html>