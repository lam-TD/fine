@extends('VietNamTour.header')
	
@section('content')
	<!-- ==================TINH TP============= -->
	<section class="tinhthanhpho">
		<div class="container">
			<div class="owl-carousel owl-theme" id="display-city">
				
				@foreach($placecount as $value)
					<div class="item">
				    	<div class="grid-item">
				    		<div class="grid-img-thumb">
				    			<div class="ribbon">
				    				<span>{{$value->amount_palce}}</span>
				    			</div>
					    		<a href="#"><img src="resourceVNT/images/img-BaiViet/1.jpg" alt="" style="height: 214px;"></a>
					    	</div>
					    	<div class="grid-content">
					    		<div class="grid-price text-left">
					    			<span>{{$value->amount_palce}}</span>
					    			<i class="far fa-hand-peace"></i>
					    		</div>
					    		<div class="grid-text">
					    			<div class="place-name">{{$value->province_city_name}}</div>
					    			<span class="pull-right">
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    					<i class="fas fa-star"></i>
				    				</span>
					    		</div>
					    	</div>
				    	</div>    	
				    </div>
				@endforeach

			</div>
		</div>
	</section>
	<!-- ==================END TINH TP============= -->

	<!-- ================== POPULAR DESTINATION============= -->
	<section class="destination" style="background-image: url('resourceVNT/images/background/1.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Địa điểm tham quan nổi tiếng</h3>
						<div class="" style="border: 1px solid #304FFE; height: 1px; width: 100%;"></div>
						<p>Những địa điểm tham quan tuyệt vời</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_see as $see)

					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$see['id_service']}}&type={{$see['sv_type']}}">
								<img src="thumbnails/{{$see['image']}}" alt="">
							</a>
							<div class="destination-name">
								<h4>{{$see['name']}}</h4>
								<h5>{{$see['name_city']}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$see['rating']}} <i class="far fa-star"></i></a>	
								<a>123 <i class="fas fa-eye"></i></a>
								<a>{{$see['like']}} <i class="far fa-thumbs-up"></i></a>
								<a>800 <i class="far fa-bookmark"></i></a>
							</div>
						</div>
					</div>

				@endforeach
				
				<div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================== END POPULAR DESTINATION============= -->

	<!-- ================== EATTING ============= -->
	<section class="destination eatting">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Ăn uống</h3>
						<div class="" style="border: 1px solid #D32E2E; height: 1px; width: 100%;"></div>
						<p>Những địa điểm ăn uống hấp dẫn !</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_eat as $eat)

					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$eat['id_service']}}&type={{$eat['sv_type']}}">
								<img src="thumbnails/{{$eat['image']}}" alt="">
							</a>
							<div class="destination-name">
								<h4>{{$eat['name']}}</h4>
								<h5>{{$eat['name_city']}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$eat['rating']}} <i class="far fa-star"></i></a>	
								<a>123 <i class="fas fa-eye"></i></a>
								<a>{{$eat['like']}} <i class="far fa-thumbs-up"></i></a>
								<a>800 <i class="far fa-bookmark"></i></a>
							</div>
						</div>
					</div>

				@endforeach
					

				<div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div>
			</div>

		</div>
	</section>
	<!-- ================== END EATTING ========= -->

	<!-- ================== HOTEL ============= -->
	<section class="hotel">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Hotels</h3>
						<div class="" style="border: 1px solid #FF6E41; height: 1px; width: 100%;"></div>
						<p>This is Amazing hotel!</p>
					</div>
				</div>	
			</div>
			<div class="row">

				@foreach($services_hotel as $hotel)

					<div class="col-md-6 col-sm-12 col-12">
						<div class="hotel-item">
							<div class="hotel-image">
								<div class="img">
									<img src="thumbnails/{{$hotel['image']}}" alt="">
								</div>
							</div>
							<div class="hotel-body">
								<div class="ratting">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<h4>{{$hotel['name']}}</h4>
								<p class="">Etiam maximus molestie accumsan. Sed metus sapien, fermentum nec lorem ac.</p>
								<div class="free-service">
									<i class="fas fa-star"></i>
								</div>
							</div>
							<div class="hotel-right">
								<div class="price">
									{{$hotel['sv_lowest_price']}}-{{$hotel['sv_highest_price']}}
								</div>
								<div class="btn">
									{{-- <a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$hotel['id_service']}}" class="btn btn-warning">Details</a> --}}
									<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$hotel['id_service']}}&type={{$hotel['sv_type']}}" class="btn btn-warning">
										Details
									</a>
								</div>
							</div>
						</div>
					</div>

				@endforeach
		
				<div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================== END HOTEL ============= -->

	<!-- ================== ENTERTAIMENT ============= -->
	<section class="destination post" style="background-image: url('../VietNamTour/images/background/2.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Entertaiment</h3>
						<div class="" style="border: 1px solid #4DC2F7; height: 1px; width: 100%;"></div>
						<p>This is Amazing Travel Agency !</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_enter as $enter)
					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$enter['id_service']}}">
								<img src="thumbnails/{{$enter['image']}}" alt="">
							</a>
							<div class="destination-name">
								<h4>{{$enter['name']}}</h4>
								<h5>{{$enter['name_city']}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$enter['rating']}} <i class="far fa-star"></i></a>	
								<a>123 <i class="fas fa-eye"></i></a>
								<a>{{$enter['like']}} <i class="far fa-thumbs-up"></i></a>
								<a>800 <i class="far fa-bookmark"></i></a>
							</div>
						</div>
					</div>
				@endforeach
					
				<div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================== END ENTERTAIMENT ============= -->

	<!-- ================== TRANSPORT ============= -->
	<section class="destination post" style="">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="title">
						<h3 class="">Transport</h3>
						<div class="" style="border: 1px solid #4DC2F7; height: 1px; width: 100%;"></div>
						<p>This is Amazing Travel Agency !</p>
					</div>
				</div>
					
			</div>
			<div class="row">

				@foreach($services_tran as $stran)
					<div class="col-md-3 col-sm-6 col-12 thumbnail-padding">
						<div class="destination-grid">
							<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$stran['id_service']}}&type={{$stran['sv_type']}}">
								<img src="thumbnails/{{$stran['image']}}" alt="">
							</a>
							<div class="destination-name">
								<h4>{{$stran['name']}}</h4>
								<h5>{{$stran['name_city']}}</h5>
							</div>
							<div class="destination-icon">	
								<a>{{$stran['rating']}} <i class="far fa-star"></i></a>	
								<a>123 <i class="fas fa-eye"></i></a>
								<a>{{$stran['like']}} <i class="far fa-thumbs-up"></i></a>
								<a>800 <i class="far fa-bookmark"></i></a>
							</div>
						</div>
					</div>
				@endforeach

				<div class="col-md-12">
					<div class="float-right"><a href="#" class="" style="color: black !important; font-weight: 500;">Xem tất cả <i class="fas fa-angle-double-right"></i></a></div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================== END TRANSPORT ============= -->

	{{-- <script>
		$(document).ready(function () {
			$.ajax({
					url: 'http://chinhlytailieu/doan3_canthotour/public/count_place_display',
					type: 'GET'
				}).done(function(response){
					$('#display-city').html(response);
			});
		})
	</script> --}}

@endsection('content')