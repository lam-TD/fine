@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="public/resource/css/hotel.css">
<link rel="stylesheet" href="public/resource/css/hotel-detail.css">
<link rel="stylesheet" href="public/resource/css/lightbox.min.css">
<link rel="stylesheet" href="public/resource/css/detail-tab.css">
<link rel="stylesheet" href="public/resource/css/user.css">

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
								<img id='img-upload' src="{{asset('public/resource/images/avatar/'.$info->contact_avatar)}}" alt="">
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


@include('VietNamTour.header-footer.footer')