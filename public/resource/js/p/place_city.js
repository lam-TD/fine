$(document).ready(function () {
	var path = window.location.pathname;

	select_sapxep();
	loctheocity();

	$('#see').click(function () {
		var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
		var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=4";
		$.ajax({
					url: path_city,
					type: 'GET'
				}).done(function(response){
					var lam = new String();

					if (response == "null") {
						$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
					}
					else{
						response.forEach(function (data) {
							lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
							lam += '<div class="destination-grid">';
							lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
							lam += data.sv_id;
							lam += '&type=' + data.sv_type +'">';
							lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
							lam += '</a>';
							lam += '<div class="destination-name">';
							lam += '<h4>' + data.name + '</h4>';
							lam += '</div>';
							lam += '<div class="destination-icon">';
							lam += '<a>' + data.rating + ' <i class="far fa-star"></i></a>';
							lam += '<a>' + data.view + ' <i class="fas fa-eye"></i></a>';
							lam += '<a>' + data.like +' <i class="far fa-thumbs-up"></i></a>';
							lam += '<a>' + data.point + ' <i class="far fa-bookmark"></i></a>';
							lam += '</div>';
							lam += '</div>';
							lam += '</div>';
							$('#content_place').html(lam);
						})
					}
				});
	})

	$('#eat').click(function () {
		var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
		var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=1";
		$.ajax({
					url: path_city,
					type: 'GET'
				}).done(function(response){
					var lam = new String();

					if (response == "null") {
						$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
					}
					else{
						response.forEach(function (data) {
							lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
							lam += '<div class="destination-grid">';
							lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
							lam += data.sv_id;
							lam += '&type=' + data.sv_type +'">';
							lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
							lam += '</a>';
							lam += '<div class="destination-name">';
							lam += '<h4>' + data.name + '</h4>';
							lam += '</div>';
							lam += '<div class="destination-icon">';
							lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
							lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
							lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
							lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
							lam += '</div>';
							lam += '</div>';
							lam += '</div>';
							$('#content_place').html(lam);
						})
					}
				});
	})

	$('#hotel').click(function () {
		var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
		var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=2";
		$.ajax({
					url: path_city,
					type: 'GET'
				}).done(function(response){
					var lam = new String();

					if (response == "null") {
						$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
					}
					else{
						response.forEach(function (data) {
							lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
							lam += '<div class="destination-grid">';
							lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
							lam += data.sv_id;
							lam += '&type=' + data.sv_type +'">';
							lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
							lam += '</a>';
							lam += '<div class="destination-name">';
							lam += '<h4>' + data.name + '</h4>';
							lam += '</div>';
							lam += '<div class="destination-icon">';
							lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
							lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
							lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
							lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
							lam += '</div>';
							lam += '</div>';
							lam += '</div>';
							$('#content_place').html(lam);
						})
					}
				});
	})

	$('#enter').click(function () {
		var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
		var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=5";
		$.ajax({
					url: path_city,
					type: 'GET'
				}).done(function(response){
					var lam = new String();

					if (response == "null") {
						$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
					}
					else{
						response.forEach(function (data) {
							lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
							lam += '<div class="destination-grid">';
							lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
							lam += data.sv_id;
							lam += '&type=' + data.sv_type +'">';
							lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
							lam += '</a>';
							lam += '<div class="destination-name">';
							lam += '<h4>' + data.name + '</h4>';
							lam += '</div>';
							lam += '<div class="destination-icon">';
							lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
							lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
							lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
							lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
							lam += '</div>';
							lam += '</div>';
							lam += '</div>';
							$('#content_place').html(lam);
						})
					}
				});
	})

	$('#tran').click(function () {
		var city_id = path.slice(path.lastIndexOf("/") + 1,path.length);
		var path_city = "http://chinhlytailieu/doan3_canthotour/public/get_all_place_city_type/" + city_id + "&type=3";
		$.ajax({
					url: path_city,
					type: 'GET'
				}).done(function(response){
					var lam = new String();

					if (response == "null") {
						$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
					}
					else{
						response.forEach(function (data) {
							lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
							lam += '<div class="destination-grid">';
							lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
							lam += data.sv_id;
							lam += '&type=' + data.sv_type +'">';
							lam += '<img src="thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
							lam += '</a>';
							lam += '<div class="destination-name">';
							lam += '<h4>' + data.name + '</h4>';
							lam += '</div>';
							lam += '<div class="destination-icon">';
							lam += '<a>' + data.rating + '<i class="far fa-star"></i></a>';
							lam += '<a>' + data.view + '<i class="fas fa-eye"></i></a>';
							lam += '<a>' + data.like +'<i class="far fa-thumbs-up"></i></a>';
							lam += '<a>' + data.point + '<i class="far fa-bookmark"></i></a>';
							lam += '</div>';
							lam += '</div>';
							lam += '</div>';
							$('#content_place').html(lam);
						})
					}
				});
	})
})

function select_sapxep(type) {
	// console.log(type);
}
function select_sapxep() {
	$('select[name=boloc_sapxep]').change(function () {
		console.log('hello');
		// city-all/id={id}&district={dis}&type={type}&fil={fil}&page={page}&li={li}
		
		
	})
}

function loctheocity() {
	$('#btnLoc').click(function () {
		var current_path = window.location.pathname;
		
		var city_id = current_path.slice(current_path.lastIndexOf("/") + 1,current_path.search("&"));
		var type    = current_path.slice(current_path.indexOf("=") + 1, current_path.lastIndexOf("&"))
		
		var district = $('select[name=selectDistrict]').val();
		if (district == 0) { district = "all"; }

		var limit = $('select[name=selectLimit]').val();

		var fil   = $('select[name=boloc_sapxep]').val();

		var li    =  $('select[name=selectLimit]').val();

		var path = 'city-all/id='+ city_id +'&district='+ district +'&type='+ type +'&fil='+ fil +'&page=1&li=' + li;
		console.log(path);
		$.ajax({
					url: path,
					type: 'GET'
				}).done(function(response){
					var lam = new String();
					
					if (response.data == null) {
						$('#content_place').html("<h2>Không có dịch vụ để hiển thị</h2>");
					}
					else{
						response.data.forEach(function (data) {
							lam += '<div class="col-md-4 col-sm-6 col-12 thumbnail-padding" style="padding-top: 0;">';
							lam += '<div class="destination-grid">';
							lam += '<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id=';
							lam += data.id_service;
							lam += '&type=' + data.sv_type +'">';
							lam += '<img src="public/thumbnails/' + data.image + '" alt="Error" style="min-height: 265px;">'
							lam += '</a>';
							lam += '<div class="destination-name">';
							lam += '<h4>' + data.name + '</h4>';
							lam += '</div>';
							lam += '<div class="destination-icon">';
							lam += '<a> ' + data.rating + ' <i class="far fa-star"></i></a>';
							lam += '<a> ' + data.view + ' <i class="fas fa-eye"></i></a>';
							lam += '<a> ' + data.like +' <i class="far fa-thumbs-up"></i></a>';
							lam += '<a> ' + data.point + ' <i class="far fa-bookmark"></i></a>';
							lam += '</div>';
							lam += '</div>';
							lam += '</div>';
							$('#content_place').html(lam);
						})
					}
				});
	})
}
