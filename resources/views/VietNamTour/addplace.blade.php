@extends('VietNamTour.header')

@section('content')

<section class="addplace">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 content">
				<h4>Thêm địa điểm mới</h4>
				<h5 style="color: red;">Thông tin cơ bản</h5>
				<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
				<form action="">
					<div class="input-text">
						<label>Tên địa điểm</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Số điện thoại</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Tỉnh thành</label>
						<select name="" id="" class="Tinh">
							<option>Cần Thơ</option>
							<option>Hà Nội</option>
						</select>
						<select name="" id="" class="Tinh">
							<option>Cần Thơ</option>
							<option>Hà Nội</option>
						</select>
					</div>
					<div class="input-text">
						<label>Kinh độ</label>
						<input type="text">
					</div>
					<div class="input-text" >
						<label>Vĩ độ</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Địa chỉ</label>
						<input type="text">
					</div>
					<div class="input-text">
						<label>Mô tả địa điểm</label>
						<textarea></textarea>
					</div>
					<div class="input-text">
						<label>Vị trí</label>
						<input type="submit" name="btnmap" value="Show Map" id="btnmap" />
					</div>
					<button class="btn btn-success col-md-12" id="btnaddplace">Thêm địa điểm mới</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>
<form id="form1" runat="server">
    <div>
        <div id="dialog" style="display: none">
            <input name="lblOfficeAddress" type="text" id="lblOfficeAddress" />
            <hr />
            <div id="canvasMap" style="height: 200px; width: 200;">
            </div>
        </div>
    </div>
    </form>
@endsection('content')