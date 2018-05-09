@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">



<style type="text/css">
	button[type="button"] {
	    background-color: none;
	    border: none;
	    border-radius: 0;
	    color: white;
	    cursor: pointer;
	    line-height: 1rem;
	    padding: .75rem 2rem;
		margin-bottom: 0px;
	}
</style>

<script>
	       $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>
	<section class="content-info">
		<div class="container">
			<div class="content">
				<div class="row">
				
					<div class="col-md-3 ">
						<div class="left-user">
							<div class="avatar">
								@if($info->contact_avatar == null)
									<img id='img-upload' src="{{asset('public/resource/images/avatar/avatar2.jpg')}}" alt="">
								@else
									<img id='img-upload' src="{{asset('public/resource/images/avatar/'.$info->contact_avatar)}}" alt="">
								@endif
								
								{{-- <h5 class="text-center">Lam The Men</h5> --}}
							</div>
							<div class="options">
								<ul>
									<li class="active">
										<a href=""><i class="far fa-edit"></i> Thông tin tài khoản</a>
									</li>
									<li class="">
										<a href="" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-secret"></i> Nâng cấp tài khoản</a>
									</li>
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

					<div id="myModal" class="modal fade" role="dialog" style="margin-top: 110px;">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title">Nâng cấp tài khoản</h5>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <div class="modal-body">
					        <div class="form-group col-md-12 row">
							    <label class="col-md-4" for="exampleInputEmail1">Quyền hiện tại</label>
							    <label style="color: red;" class="col-md-4" for="exampleInputEmail1">Người dùng</label>
							</div>
							<div class="form-group col-md-12 row" style="float: left;">
							    <label class="col-md-4" for="">Nâng cấp</label>
							    <div class="col-md-8">
							    	<select class="form-control col-md-12" id="" name="selectnangcap">
								      <option>Doanh nghiệp</option>
								      <option>Công tác viên</option>
								      <option>Hướng dẫn viên du lịch</option>
								    </select>
							    </div>
							</div>
							<div class="form-group col-md-12 row" style="float: left;">
							    <label class="col-md-4" for="">Lưu ý</label>
							    <div class="col-md-8">
							    	<small id="emailHelp" class="form-text text-muted">Tài khoản muốn nâng cấp cần sự xét duyệt của admin</small>
							    </div>
							</div>
					      </div>

					      <div class="modal-footer">
					        <button style="background-color: #dd4b39 !important" type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
					        <button style="background-color: #444fce !important" type="button" class="btn btn-primary" data-dismiss="modal">Nâng cấp</button>
					      </div>
					    </div>

					  </div>
					</div>



					<div class="col-md-9">
						<div class="right-user">
							<div class="info-account">
								<h4 class="text-center" style="margin-top: 10px;"><b>THÔNG TIN TÀI KHOẢN</b></h4>
								<form class="form-info" action="" method="post" enctype='multipart/form-data'>
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Họ và tên</label>
											<input name="name" type="text" class="form-control" id="" placeholder="Họ tên" value="{{$info->contact_name}}">
											<p class="text-danger">{{$errors->first('name')}}</p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Email</label>
											<input name="email" type="email" class="form-control" id="" placeholder="Email" value="{{$info->contact_email_address}}">
											<p class="text-danger">{{$errors->first('email')}}</p>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Số điện thoại</label>
											<input name="phone" type="number" class="form-control" id="" placeholder="Điện thoại" value="{{$info->contact_phone}}">
											<p class="text-danger">{{$errors->first('phone')}}</p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Website</label>
											<input name="website" type="text" class="form-control" id="" placeholder="Website" value="{{$info->contact_website}}">
											<p class="text-danger">{{$errors->first('website')}}</p>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
									
											<div class="input-group">
												<span class="input-group-btn">
													<span class="btn btn-primary btn-file">
														Chọn tệp… <input type="file" id="imgInp" name="image" value="" >
														
													</span>
												</span>
												<input type="text" class="form-control" value="" readonly>
											
												
											</div>
											<p class="text-danger">{{ $errors->first('image') }}</p>
										</div>	
									
								
									
										<div class="form-group col-md-6">
											<label for="inputState">Ngôn ngữ</label>
											<select name="lang" id="inputState" class="form-control">
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
	<script src="public/resource/js/p/account.js"></script>


@include('VietNamTour.header-footer.footer')