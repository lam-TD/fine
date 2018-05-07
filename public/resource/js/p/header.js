var id_tinh = null;

$(document).ready(function () {
	// load select city
		$.ajax({
			url: 'http://chinhlytailieu/vntour_api/count_city_service_all',
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<li class="selectItem" data-id="' + data.id_city + '" data-name="' + data.name_city +'">';
				lam += '<a class="selectItem-name">';
				lam += '<label>'+ data.name_city +'</label>';
				lam += '<span class="float-right">'+ data.num_service + '</span>';
				lam += '</a>';
				lam += '</li>';
				$('#content-tinhtp-id').html(lam);
			})
			gantentinh();
		})
		search();
})

function gantentinh() {
	var select_Item = document.getElementsByClassName('selectItem');
	
	for (var i = 0; i < select_Item.length; i++) {
		select_Item[i].onclick = function () {
			var id = this.getAttribute('data-id');
			document.getElementById('a-tinhTP').innerHTML = this.getAttribute('data-name') + ' <i class="fas fa-angle-down float-right" style="margin-top:5px;"></i>';
			document.getElementById('a-tinhTP').setAttribute("data-id",id);
			document.getElementById('a-tinhTP').setAttribute("data-name",this.getAttribute('data-name'));
			id_tinh = $('#a-tinhTp').attr('data-idtinh');
		}
	}
}


//=================== SEARCH ================
function search() {
	$('#text-search-top').keyup(function () {
		var id_tinh = document.getElementById('a-tinhTP').getAttribute('data-id'); // id tinh thanh pho
		var ten_tinh = document.getElementById('a-tinhTP').getAttribute('data-name');
		
		var type = $('#a-danhmuc').attr('data-type'); // type dich vu
		var ten_type = $('#a-danhmuc').attr('data-name');
		
		var path = null;
		var keyword = $('#text-search-top').val();
		keyword_handle = keyword.replace(" ","+");

		// $('#thanSearch').html('');
		if (id_tinh == "all" && type == "all" && keyword.length > 0) 
		{
			path = 'http://chinhlytailieu/vntour_api/searchServices_All/keyword=' + keyword_handle;
			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.eat.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html('Ăn uống');
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.eat.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
				}else{document.getElementById('eatCha').style.display = 'none';}

				if (response.hotel.length > 0) 
				{
					if (document.getElementById('hotelCha') != null) {
						document.getElementById('hotelCha').style.display = 'block';
					}
					$('#tieudeSearchHotel').html('Khách sạn');
					var eat = new String();
					response.hotel.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 2;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_hotel').html(eat);
				}else{document.getElementById('hotelCha').style.display = 'none';}

				if (response.tran.length > 0) 
				{
					if (document.getElementById('tranCha') != null) {
						document.getElementById('tranCha').style.display = 'block';
					}
					$('#tieudeSearchTran').html('Phương tiện');
					var eat = new String();
					response.tran.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 3;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_tran').html(eat);
				}else{document.getElementById('tranCha').style.display = 'none';}

				if (response.see.length > 0) 
				{
					if (document.getElementById('seeCha') != null) {
						document.getElementById('seeCha').style.display = 'block';
					}
					$('#tieudeSearchSee').html('Tham quan');
					var eat = new String();
					response.see.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 4;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_see').html(eat);
				}else{document.getElementById('seeCha').style.display = 'none';}

				if (response.enter.length > 0) 
				{
					if (document.getElementById('enterCha') != null) {
						document.getElementById('enterCha').style.display = 'block';
					}
					$('#tieudeSearchEnter').html('Vui chơi');
					var eat = new String();
					response.enter.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 5;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_enter').html(eat);
				}else{document.getElementById('enterCha').style.display = 'none';}

			}).fail(function (response) {
				// $('#thanSearch').html('');
			})
		}
		else if(id_tinh != "all" && type == "all" && keyword.length > 0)
		{
			path = 'http://chinhlytailieu/vntour_api/searchService_City_AllType/idcity='+ id_tinh +'&keyword=' + keyword_handle;

			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.eat.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html('Ăn uống');
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.eat.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
				}else{document.getElementById('eatCha').style.display = 'none';}

				if (response.hotel.length > 0) 
				{
					if (document.getElementById('hotelCha') != null) {
						document.getElementById('hotelCha').style.display = 'block';
					}
					$('#tieudeSearchHotel').html('Khách sạn');
					var eat = new String();
					response.hotel.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 2;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_hotel').html(eat);
				}else{document.getElementById('hotelCha').style.display = 'none';}

				if (response.tran.length > 0) 
				{
					if (document.getElementById('tranCha') != null) {
						document.getElementById('tranCha').style.display = 'block';
					}
					$('#tieudeSearchTran').html('Phương tiện');
					var eat = new String();
					response.tran.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 3;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_tran').html(eat);
				}else{document.getElementById('tranCha').style.display = 'none';}

				if (response.see.length > 0) 
				{
					if (document.getElementById('seeCha') != null) {
						document.getElementById('seeCha').style.display = 'block';
					}
					$('#tieudeSearchSee').html('Tham quan');
					var eat = new String();
					response.see.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 4;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_see').html(eat);
				}else{document.getElementById('seeCha').style.display = 'none';}

				if (response.enter.length > 0) 
				{
					if (document.getElementById('enterCha') != null) {
						document.getElementById('enterCha').style.display = 'block';
					}
					$('#tieudeSearchEnter').html('Vui chơi');
					var eat = new String();
					response.enter.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 5;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_enter').html(eat);
				}else{document.getElementById('enterCha').style.display = 'none';}

			}).fail(function (response) {
				
			})
		}
		else if(id_tinh != "all" && type != "all" && keyword.length > 0)
		{
			path = 'http://chinhlytailieu/vntour_api/searchService_City_Type/idcity='+ id_tinh +'&type='+ type +'&keyword=' + keyword_handle;
			var title = 'Bộ lọc: ' + ten_tinh + ' + ' + ten_type;

			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html(title);
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
				}else{document.getElementById('eatCha').style.display = 'none';}

			}).fail(function (response) {
				
			})
		}
		else
		{
			path = 'http://chinhlytailieu/vntour_api/searchServices_AllCity_idType/type='+ type +'&keyword=' + keyword_handle;
			var title = 'Bộ lọc: ' + ten_tinh + ' + ' + ten_type;

			$.ajax({
				url: path,
				type: 'GET',
				dataType: 'json'
			}).done(function (response) {
		
				if (response.length > 0) 
				{	
					if (document.getElementById('eatCha') != null) {
						document.getElementById('eatCha').style.display = 'block';
					}
					$('#tieudeSearchEat').html(title);
					var eat = new String(); // khoi tao bien luu phan hien thi len view
					response.forEach(function (data) {
						var url_detail = 'detail/id='+ data.sv_id +'&type=' + 1;
						eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
					})
					$('#search_eat').html(eat);
				}else{document.getElementById('eatCha').style.display = 'none';}

			}).fail(function (response) {
				
			})
		}
		
			
	})
		
}

function search_type(url, image,name,description) { //
	var eat = new String();
	eat += 	'<div class="content-search">';
	eat +=	'<a href="' + url + '" class="clickSearch">';
	eat +=	'<div class="left-content-search">';
	eat +=	'<img src="public/thumbnails/'+ image +'" alt="">';
	eat +=	'</div>';
	eat +=	'<div class="right-content-search">';
	eat +=	'<p>'+ name +'</p>';
	eat +=	'<p style="font-size: 13px; color: #d2cece; font-weight: 400; max-height: 20px;max-width:321px;text-overflow: ellipsis;">'+ description +'</p>';
	eat +=	'</div>';
	eat +=	'</a>';		
	eat +=	'</div>';
	return eat;
}

//=============== LUU search neu co login
