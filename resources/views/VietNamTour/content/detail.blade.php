@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/chat.css">

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD4NgGvVNbWb_bMXOdeHLMWVhHm_HITw34&sensor=false"></script>

	{{-- <div id="latitude">{{$sv['pl_latitude']}}</div> --}}
	{{-- <div id="longitude">{{$sv['pl_longitude']}}</div> --}}

	<section class="content-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-7" style="padding-right: 0;">
					<div class="hotel-detail-left">
						<div class="accordian">
							<ul>
								<li>
									<a>
										<img src="public/thumbnails/{{$sv->image_details_1}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="public/thumbnails/{{$sv->image_details_2}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="public/thumbnails/{{$sv->image_banner}}"/>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-5" style="padding-left: 0;">
					<div class="hotel-detail-right">
						<div class="title" style="text-align: left; margin-bottom: 5px;">
							<div id="latitude" data-lati="{{$sv->pl_latitude}}" data-lon="{{$sv->pl_longitude}}"></div>
							<p>
								<a>{{$sv->city_name}} <i class="fas fa-angle-double-right"></i></a> 
								<a>{{$sv->district_name}} <i class="fas fa-angle-double-right"></i></a> 
								<a>{{$sv->ward_name}}</a>
							</p>
							<h4 style="font-size: 20px;" id="sv_name">{{$sv->sv_name}}</h4> {{-- ten dich vu --}}
							<div class="star">
								@for($i = 0;$i < $sv->sv_rating; $i++)
									<i class="fas fa-star"></i>
								@endfor
								<span style="color: black" id="loaihinhdichvu">
									@if($sv->sv_types == "1")
										- Ăn uống
									@elseif($sv->sv_types == "2")
										- Khách sạn
									@elseif($sv->sv_types == "3")
										- Phương tiện
									@elseif($sv->sv_types == "4")
										- Tham quan
									@else
										- Vui chơi
									@endif
								</span> {{-- loai hinh dich vu --}}
							</div>
						</div>
						<div class="hotel-body">
							<p style="margin: 0;" id="mota-dichvu">{{$sv->sv_description}}</p>
							<div class="row">
								<div class="col-md-3">
									<a id="">
										<i class="far fa-bookmark"></i>
										{{$sv->sv_point}}
									</a>
								</div>
								<div class="col-md-3 text-center">
									<a title="Lượt xem">
										<i class="fas fa-eye"></i>
										{{$sv->sv_view}}
									</a>
								</div>
								<div class="col-md-3 text-center">
									<a id="like01">
										<i id="color-like" class="fas fa-heart"></i>
										<span id="num_like">{{$sv->sv_like}}</span>
									</a>
								</div>
								<div class="col-md-3 text-center">
									<a id="">
										<i class="fas fa-share"></i>
									</a>
								</div>
							</div>
							<div class="service">
								<ul>
									<li>
										<div class="icon-f"><i class="fas fa-paper-plane"></i></div>
										   Lê Lợi, Lô E1, Cồn Cái Khế, P. Cái Khế, Q.Ninh Kiều, Quận Ninh Kiều
									</li>
									<li>
										<div class="icon-f">
											<i class="fas fa-phone"></i>
										</div>
										<span id="phonenumber">{{$sv->sv_phone_number}}</span> {{-- sodienthoai --}}
									</li>

									<li>
										<div class="icon-f">
											<i class="far fa-clock"></i>
										</div>
										<span id="giomocua">{{$sv->sv_close}}</span> {{-- gio mo cua --}}
										<i class="fas fa-arrow-right"></i> 
										<span id="giodongcua">{{$sv->sv_open}}</span> {{-- gio mo cua --}}
									</li>

									<li>
										<div class="icon-f">
											<i class="fas fa-tag"></i>
										</div>
										<span id="giathapnhat">{{$sv->sv_lowest_price}}</span> {{-- gia thap nhat --}}
										<i class="fas fa-arrow-right"></i> 
										<span id="giacaonhat">{{$sv->sv_highest_price}}</span>  {{-- gia cao nhat --}}
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="" style="margin-top: 15px;">
						<div class="tabbable-panel">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_1" data-toggle="tab" style="text-align: center;">
										Giới thiệu </a>
									</li>
									<li class="tab-lam active" style="width: 25%;">
										<a href="#tab_default_2" data-toggle="tab" style="text-align: center;">
										Album ảnh </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_3" data-toggle="tab" style="text-align: center;">
										Đánh giá </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_4" data-toggle="tab" style="text-align: center;">
										Bản đồ </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane" id="tab_default_1">
										<h5 style="font-weight: 700;padding-left: 17px;">GIỚI THIỆU</h5>
										<p style="text-align: justify; padding: 10px;" >
											{{$sv->sv_description}}
										</p>
									</div>

									<div class="tab-pane active" id="tab_default_2">
										<h5 style="font-weight: 700;padding-left: 17px;">Album ảnh</h5>
										<section class="demo" style="background-color: transparent;">
											<div class="gallery">
												<a style="background-color: transparent;" href="http://i.imgur.com/80WaVuY.jpg" title="" data-fluidbox class="col-12"><img src="http://i.imgur.com/80WaVuY.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/9OQWB.jpg" title="" data-fluidbox class="col-6"><img src="http://i.imgur.com/9OQWB.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/UvGHJjo.jpg" title="" data-fluidbox class="col-6"><img src="http://i.imgur.com/UvGHJjo.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/esWWGbF.jpg" title="" data-fluidbox class="col-4"><img src="http://i.imgur.com/esWWGbF.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/ZCogT10.jpg" title="" data-fluidbox class="col-4"><img src="http://i.imgur.com/ZCogT10.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/24hrPQn.jpg" title="" data-fluidbox class="col-4"><img src="http://i.imgur.com/24hrPQn.jpg" alt="" title="" /></a>
											</div>
										</section>
									</div>

									<div class="tab-pane" id="tab_default_3">
										<div class="wrapper wrapper-content animated fadeInRight" style="padding: 0;">
										    <div class="row">
										        <div class="col-lg-12">
										            <div class="ibox float-e-margins" style="border-style: none;">
										                <div class="ibox-content">
										                    <h5 style="font-weight: 700;">ĐÁNH GIÁ DỊCH VỤ</h5>
										                </div>
										                <div class="ibox-content">
										                	Bạn chưa đánh giá về địa điểm này
										                </div>
										            </div>
										        </div>
										    </div>
										    <div class="row">
										        <div class="col-lg-12">
										            <div class="ibox chat-view">
										                <div class="ibox-content">
										                    <div class="row">
										                        <div class="col-md-12">
										                            <div class="chat-discussion" style="background-color: white;">
										                                <div class="chat-message left">
										                                    <img class="message-avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										                                    <div class="message">
										                                        <a class="message-author" href="#"> Michael Smith </a>
										                                        <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
										                                        <span class="message-content">
										    										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
									                                            </span>
										                                    </div>
										                                </div>
										                                <div class="chat-message left">
										                                    <img class="message-avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
										                                    <div class="message">
										                                        <a class="message-author" href="#"> Michael Smith </a>
										                                        <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
										                                        <span class="message-content">
										    										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
									                                            </span>
										                                    </div>
										                                </div>
										                            </div>
										                        </div>
										                    </div>
										                </div>
										            </div>
										        </div>
										    </div>
										</div>
									</div>

									<div class="tab-pane" id="tab_default_4">
										<h5 style="font-weight: 700;padding-left: 17px;">THÔNG TIN BẢN ĐỒ</h5>
										<div class="col-md-12">
											<div id="googleMap" style="width: 100%; height: 400px;">
												Google Map
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4" style="padding-left: 0;">
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Địa điểm lân cận</h5>
						</div>
						<div class="body-right-content" style="height: 600px;overflow-y: scroll;">
							@foreach($sv_lancan as $s)
								<div class="item-cafe">
									<ul>
										<li>
											<a href="detail/id={{$s->sv_id}}&type={{$s->sv_type}}">
												<img src="public/thumbnails/{{$s->image_banner}}" alt="loi" style="height: 100%;width: 110px;">
												<div class="text-item-cafe text-left">
													<h6 style="margin-bottom: 0;display: inline-block;text-overflow: ellipsis;">	<b style="font-weight: 600;">{{$s->sv_name}}</b>
													</h6>
													<p class="text-left" style="font-size: 13px;">
														@if($s->sv_type == 1)
															Ăn uống
														@elseif($s->sv_type == 2)
															Khách sạn
														@elseif($s->sv_type == 3)
															Phương tiện
														@elseif($s->sv_type == 4)
															Tham quan
														@elseif($s->sv_type == 5)
															Vui chơi
														@endif
													</p>
												</div>
											</a>
										</li>
									</ul>
								</div>
							@endforeach	
						</div>
					</div>	
					
				</div>
			</div>
		</div>

	</section>
	

	<script type="text/javascript">
		var gmap = new google.maps.LatLng(10.765974,106.689422);
		var marker;
		var latitude = document.getElementById("latitude").getAttribute('data-lati');
		var longitude = document.getElementById("latitude").getAttribute('data-lon');
		function initialize()
		{
		    var mapProp = {
		         center:new google.maps.LatLng(latitude,longitude),
		         zoom:16,
		        mapTypeId:google.maps.MapTypeId.ROADMAP
		    };
		 
		    var map=new google.maps.Map(document.getElementById("googleMap")
		    ,mapProp);
		 
		  var styles = [
		    {
		      featureType: 'road.arterial',
		      elementType: 'all',
		      stylers: [
		        { hue: '#fff' },
		        { saturation: 100 },
		        { lightness: -48 },
		        { visibility: 'on' }
		      ]
		    },{
		      featureType: 'road',
		      elementType: 'all',
		      stylers: [
		 
		      ]
		    },
		    {
		        featureType: 'water',
		        elementType: 'geometry.fill',
		        stylers: [
		            { color: '#adc9b8' }
		        ]
		    },{
		        featureType: 'landscape.natural',
		        elementType: 'all',
		        stylers: [
		            { hue: '#809f80' },
		            { lightness: -35 }
		        ]
		    }
		  ];
		 
		  var styledMapType = new google.maps.StyledMapType(styles);
		  map.mapTypes.set('Styled', styledMapType);
		 
		  marker = new google.maps.Marker({
		    map:map,
		    draggable:true,
		    animation: google.maps.Animation.DROP,
		    position: gmap
		  });
		  google.maps.event.addListener(marker, 'click', toggleBounce);
		}
		 
		function toggleBounce() {
		 
		  if (marker.getAnimation() !== null) {
		    marker.setAnimation(null);
		  } else {
		    marker.setAnimation(google.maps.Animation.BOUNCE);
		  }
		}
		 
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>




	<script src="public/resource/js/lightbox.min.js"></script>
	<script src="public/resource/js/detail-hotel.js"></script>
	<script src="public/resource/js/menu-style.js"></script>

	{{-- <script src="resource/js/menu-style.js"></script> --}}
	<script src="public/resource/lightbox/jquery.fluidbox.min.js"></script>

	<script>
		$(function () {			
			$('.demo a[data-fluidbox]').fluidbox();
		});
	</script>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded",function () {
		    var aTab = document.getElementsByClassName('tab-lam');
		    
		    for (var i = 0; i < aTab.length; i++) {
		        aTab[i].onclick = function(){
		        	// console.log(aTab[i]);
		            for (var i = 0; i < aTab.length; i++) {
		                aTab[i].classList.remove('active');
		            }
		            this.classList.add('active');
		        }
		    }
		    
		},false);
	</script>
	
	<script src="public/resource/js/p/detail.js"></script>

@include('VietNamTour.header-footer.footer')