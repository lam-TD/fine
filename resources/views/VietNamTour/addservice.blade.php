@extends('VietNamTour.header')

@section('content')

<section class="addplace">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 content">
				<h4>Thêm dịch vụ mới</h4>
				<h6 style="color: #bd1717;">Thông tin cơ bản</h6>
				<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
				<form action="">


					<div class="input-text">
						<label>Tên dịch vụ</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Loại hình</label>
						<select name="" id="" class="Tinh">
							<option>Tham quan</option>
							<option>Ăn uống</option>
							<option>Khách sạn</option>
							<option>Phương tiện</option>
							<option>Vui chơi</option>
						</select>
					</div>
					<div class="input-text">
						<label>Số điện thoại</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Tỉnh thành</label>
						<select name="" id="" class="Tinh2">
							<option>--Tỉnh--</option>
							<option>Hà Nội</option>
						</select>
						<select name="" id="" class="Tinh2">
							<option>--Quận huyện--</option>
							<option>Hà Nội</option>
						</select>
						<select name="" id="" class="Tinh2">
							<option>--Địa điểm--</option>
							<option>Hà Nội</option>
						</select>
					</div>
					<div class="input-text">
						<label>Địa chỉ</label>
						<input type="text" class="">
					</div>
					<div class="input-text">
						<label>Mô tả dịch vụ</label>
						<textarea></textarea>
					</div>
					<h6 style="color: #bd1717;">Thời gian hoạt động</h6>
					<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
					<div class="input-text">
						<label>Giờ đóng cửa</label>
						<select name="" id="" class="Tinh">
							<option>00</option>
							<option></option>
						</select>
						<select name="" id="" class="Tinh">
							<option>00</option>
							<option>Hà Nội</option>
						</select>
					</div>
					<div class="input-text">
						<label>Giờ mở cửa</label>
						<select name="" id="" class="Tinh">
							<option>00</option>
							<option>Hà Nội</option>
						</select>
						<select name="" id="" class="Tinh">
							<option>00</option>
							<option>Hà Nội</option>
						</select>
					</div>
					<h6 style="color: #bd1717;">Giá dịch vụ</h6>
					<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
					<div class="input-text">
						<label>Giá thấp nhất</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Giá cao nhất</label>
						<input type="text">
					</div>

					<button class="btn btn-success col-md-12" id="btnaddplace">Thêm địa điểm mới</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>

@endsection('content')