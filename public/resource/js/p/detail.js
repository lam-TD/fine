$(document).ready(function () {
	checkLogin();
	check_rating();
})


function checkLogin() {
	// kiem tra xem co dang nhap hay chua
	var path = window.location.pathname;
	var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
	var dem = 0;
	$.ajax({
			url: 'check-login',
			type: 'GET',
			dataType: 'json'
		})
		.done(function (response) {
			if (response > 0) 
			{
				var pathCheckLike = 'http://chinhlytailieu/vntour_api/checkLike/userid=' + response + '&svid=' + service_id;
				
				$.ajax({
						url: pathCheckLike,
						type: 'GET',
						dataType: 'json'
					})
					.done(function (response) {
						var l = parseInt(response);
						if (l == 1) 
						{
							$('#like01').css("color","red");
							$('#like01').click(function () {
								// console.log($('#num_like').innerHTML);
								if (dem % 2 == 0) 
								{
									var lam = document.getElementById('num_like').innerHTML;
									var l = parseInt(lam) - 1;
									document.getElementById('num_like').innerHTML = l;
									$('#like01').css("color","blue");
									dem++; 
								}
								else{	
									var lam = document.getElementById('num_like').innerHTML;
									var l = parseInt(lam) + 1;
									document.getElementById('num_like').innerHTML = l;
									dem++;
								}
								ThemVaCapNhat();
							});
							
						}
						else{
							$('#like01').click(function () {
								console.log("Them vao");
							if (dem % 2 == 0) 
							{
								var lam = document.getElementById('num_like').innerHTML;
								var l = parseInt(lam) + 1;
								document.getElementById('num_like').innerHTML = l;
								dem++; 
							}
							else{	
								var lam = document.getElementById('num_like').innerHTML;
								var l = parseInt(lam) - 1;
								document.getElementById('num_like').innerHTML = l;
								dem++;
							}
							ThemVaCapNhat();
					});
						}
					}).fail(function (response) {
							return -1;
					})

				
			}
			else{
				$('#like01').click(function () {
					var chon = confirm('Bạn cần đăng nhập để Like dịch vụ này');
					if (chon) 
					{
						window.location.assign('loginW');
					}
				});
					   
			}
		}).fail(function (response) {
				return null;
		})
}

function kiemtradangnhap() {
	// body...
}

function check_rating() {

	$('#btnsave').click(function () {
		
		var rating = $('#txtrating').val();
        var detail = $('#txtdetail').val();
        if (rating == null || rating == 0) {
            $('#errorating').css('display','block');
        }
        else if(detail == ""){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','block');
        }
        else if(rating > 5){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','none');
            $('#erroratingPoint').css('display','block');
        }
        else{
        	var path = window.location.pathname;
			var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
        	var path2 = 'save_rating/id='+ service_id +'&rating='+ rating +'&detail=' + detail;

        	$.ajax({
				url: path2,
				type: 'GET'
			})
			.done(function (response) {
				alert('Đánh giá thành công');
				location.reload();
			})
			
	    }
	})

	$('#btnsave2').click(function () {
		
		var rating = $('#txtrating2').val();
        var detail = $('#txtdetail2').val();
        if (rating == null || rating == 0) {
            $('#errorating').css('display','block');
        }
        else if(detail == ""){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','block');
        }
        else if(rating > 5){
        	$('#errorating').css('display','none');
            $('#errordetail').css('display','none');
            $('#erroratingPoint').css('display','block');
        }
        else{
        	var path = window.location.pathname;
			var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
        	var path2 = 'save_update_rating/id='+ service_id +'&rating='+ rating +'&detail=' + detail;

        	$.ajax({
				url: path2,
				type: 'GET'
			})
			.done(function (response) {
				alert('Cập nhật thành công đánh giá');
				location.reload();
			})
			
	    }
	})
}

function ThemVaCapNhat() {
	var path = window.location.pathname;
	var service_id = path.slice(path.lastIndexOf("/") + 4,path.search("&")); // lay id service tu url
	//ThemVaCapNhatLike/{idserivce}&user={id}
	var path2 = 'ThemVaCapNhatLike/' + service_id;
	$.ajax({
		url: path2,
		type: 'GET'
	})
	.done(function (response) {
		
	})
}