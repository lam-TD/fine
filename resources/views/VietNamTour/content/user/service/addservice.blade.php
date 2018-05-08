@include('VietNamTour.header-footer.header')

<link rel="stylesheet" href="public/resource/css/select2.min.css">
<link rel="stylesheet" href="public/resource/css/addplace.css">



<section class="addplace">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 content" style="margin-top: 80px;">
				<h4 style="font-size: 25px; font-weight: bold;" class="text-center">Thêm địa điểm mới</h4>
				<h5 style="color: red;">Thông tin cơ bản</h5>
				<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
				<form action="">
					<div class="input-text col-md-12">
						<label class="col-md-2">Tên địa điểm</label>
						<input type="text">
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2">Điện thoại</label>
						<input type="text">
					</div>

					<div class="input-text col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2">Tỉnh thành</label>
						<select class="js-example-basic-single col-md-4" name="city">
              <option value="0">Chọn tỉnh thành phố</option>
							{{-- @foreach($city as $c)
							  <option value="{{$c->id}}">{{$c->province_city_name}}</option>
							@endforeach --}}
						</select>
						<label class="col-md-2" style="margin-right: -10px;display: inline-block;">Quận huyện</label>
						<select class="js-example-basic-single col-md-3" name="districtt" id="district">
              <option value="0">Chọn quận huyện</option>
						</select>
					</div>

					<div class="col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2" style="width: 150px;font-size: 14px;font-weight: bold;">Khu vực</label>
						<select class="js-example-basic-single col-md-9" name="" id="ward" style="padding: 0">
						</select>
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2">Địa chỉ</label>
						<input type="text">
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2" style="">Mô tả</label>
						<textarea style="height: 105px;"></textarea>
					</div>

					

					<div class="input-text col-md-12">
						<label class="col-md-2" style="padding: 0;">Nhập trực tiếp</label>
						<input type="text" placeholder="Vĩ độ" class="col-md-4">
						<input type="text" placeholder="Kinh độ" class="col-md-4">
					</div>

					<button class="btn btn-success col-md-12" id="btnaddplace" style="margin-top: 20px;">
						Thêm địa điểm mới
					</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>


<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>

<script src="public/resource/js/p/addplace.js"></script>





@include('VietNamTour.header-footer.footer')
