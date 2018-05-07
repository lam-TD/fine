@include('VietNamTour.header-footer.header')


<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/place.css">

<style media="screen">
	.active-type{
		color: #fec107 !important;
	}
</style>
<section class="place-inner" style="margin-top:120px;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" id="boloc">
				<div class="tools-ber">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<div class="input-group custom-search">
								<!-- <input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn place-search">
										<span><i class="fas fa-search"></i></span>
									</button>
								</span> -->
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-6" style="padding-left: 2px;">
							<!-- filter select -->
							<div class="select-filter">
								<select name="boloc_sapxep" id="boloc_sapxep">
									<option value="2" selected>Đánh giá cao nhất</option>
									<option value="1">Lượt xem nhiều nhất</option>
									{{-- <option value="1">Lượt thích</option> --}}
									{{-- <option value="2">Điểm cao</option> --}}
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-6">
							<div class="select-filter">
								<select name="selectDistrict" id="">
									<option value="0" selected>Tất cả</option>
									@foreach($district as $d)
									<option value="{{$d->id_district}}">{{$d->name_district}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<button class="btn btn-primary" id="btnLoc">Lọc</button>
						</div>
						<div class="col-md-1 text-right-filter"><span>Hiển thị</span></div>
						<div class="col-md-1 float-right">
							<div class="select-filter" style="width: 55px;">
								<select name="selectLimit" id="">
									<option value="9">9</option>
									<option value="18">18</option>
									<option value="27">27</option>
								</select>
							</div>
						</div>
					</div>
				</div><!-- end tools-ber -->
			</div>
			<!-- left -->
			<div class="col-md-3 .col-sm-4">
				<div class="left-box">
					<div class="box-title">
						Cần Thơ
						<span>{{$count_sv['num_all']}}</span>
					</div>
					<div class="box-body">
						<ul>
							<li><a href="" class="active-type">Tất cả<span class="active-type">{{$count_sv['num_all']}}</span></a></li>
							<li><a href="city/{{$idcity}}&type=4&page=1">Tham quan<span>{{$count_sv['num_see']}}</span></a></li>
							<li><a href="city/{{$idcity}}&type=1&page=1">Ăn uống<span>{{$count_sv['num_eat']}}</span></a></li>
							<li><a href="city/{{$idcity}}&type=2&page=1">Khách sạn<span>{{$count_sv['num_hotel']}}</span></a></li>
							<li><a href="city/{{$idcity}}&type=5&page=1">Vui chơi<span>{{$count_sv['num_enter']}}</span></a></li>
							<li><a href="city/{{$idcity}}&type=3&page=1">Phương tiện<span>{{$count_sv['num_tran']}}</span></a></li>
						</ul>
					</div>
				</div>

			</div><!-- end left -->
			<!-- right -->
			<div class="col-md-9 .col-sm-8">
				<div class="place-list-content">
					<div class="row" id="content_place">
						@if($service_city['data'] != null)
							@foreach($service_city['data'] as $sv)
							<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top:0;">
								<div class="destination-grid">
									<a href="detail/id={{$sv['id_service']}}&type={{$sv['sv_type']}}">
										<img src="public/thumbnails/{{$sv['image']}}" alt="" style="min-height:269px;">
									</a>
									<div class="destination-name">
										<h4>{{$sv['name']}}</h4>
									</div>
									<div class="destination-icon">
										<a>{{$sv['rating']}} <i class="far fa-star"></i></a>
										<a>{{$sv['view']}} <i class="fas fa-eye"></i></a>
										<a>{{$sv['like']}} <i class="far fa-heart"></i></a>
										<a>{{$sv['point']}} <i class="far fa-bookmark"></i></a>
									</div>
								</div>
							</div>
							@endforeach
						@else
							<h3 style="color: red;">Chưa có dữ liệu</h3>
						@endif
							
					</div>
				</div><!-- end place-list-content -->
				<div class="pagination-inner">
					<div class="row">
						<div class="col-md-2 col-sm-2">
							<div class="prev">
								<!-- <a href=""><i class="fas fa-arrow-left"></i></a> -->
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-12">
							<div class="float-center">
								<ul class="pagination">
									@if($service_city['total_page'] > 1)
										@if($service_city['current_page'] == 1)
											<li class="page-item">
												<a class="page-link" href="#" disabled="disabled" style="pointer-events: none;cursor: default;text-decoration: none;">
													<i class="fas fa-arrow-left"></i>
												</a>
											</li>
										@else
										<li class="page-item">
											<a class="page-link" href="city/{{$idcity}}&type=all&page={{$service_city['current_page'] - 1 }}" disabled="disabled" style="">
												<i class="fas fa-arrow-left"></i>
											</a>
										</li>
										@endif

										@for($i = 1; $i <= $service_city['total_page']; $i++)
											@if($service_city['current_page'] == $i)
												<li class="page-item activee"><a class="page-link" href="city/{{$idcity}}&page={{$i}}">{{$i}}</a></li>
											@else
												<li class="page-item"><a class="page-link" href="city/{{$idcity}}&page={{$i}}">{{$i}}</a></li>
											@endif
										@endfor

										@if($service_city['current_page'] == $service_city['total_page'])
											<li class="page-item">
												<a class="page-link" href="#" disabled="disabled" style="pointer-events: none;cursor: default;text-decoration: none;">
													<i class="fas fa-arrow-right"></i>
												</a>
											</li>
										@else
										<li class="page-item">
											<li class="page-item"><a class="page-link" href="city/{{$idcity}}&page={{$service_city['current_page'] + 1}}"><i class="fas fa-arrow-right"></i></a></li>
										</li>
										@endif

									@endif
								</ul>
							</div>

						</div>
						<div class="col-md-2 col-sm-2">
							<div class="prev text-right float-right">
								<!-- <a href=""><i class="fas fa-arrow-right"></i></a> -->
							</div>
						</div>
					</div>

				</div>
			</div><!-- end right -->
		</div> <!-- end row -->
	</div>
</section>

	<!-- <script src="resource/js/lightbox.min.js"></script> -->
	<!-- <script src="resource/js/menu-style.js"></script> -->
	<script src="public/resource/js/p/place_city.js"></script>

@include('VietNamTour.header-footer.footer')
