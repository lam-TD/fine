$(document).ready(function () {
	load_district();
	load_ward();
	// autoloadWar();
})


//load quan theo tinh thanh pho
function load_district() {
	$('select[name=city]').change(function () {
		var path = 'loadDistrict/' + $(this).val();
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			// lam += '<option value="0">Chọn tỉnh quận huyện</option>';
			response.forEach(function (data) {
				lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
			})
			$('#district').html(lam);
			load_ward();
		})
	})
}

// load ward
function load_ward() {
	var path = 'loadWard/' + $('select[name=districtt]').val();
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		response.forEach(function (data) {
			lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
		})
		$('#ward').html(lam);
	});

	$('select[name=districtt]').change(function () {
		var path = 'loadWard/' + $(this).val();
		$.ajax({
			url: path,
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
			})
			$('#ward').html(lam);
		})
	})
}

function autoloadWar() {
	var path = 'loadWard/' + $('select[name=districtt]').val();
	console.log(path);
	$.ajax({
		url: path,
		type: 'GET'
	})
	.done(function (response) {
		var lam = new String(); // khoi tao bien luu pha hien thi len view
		response.forEach(function (data) {
			lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
		})
		$('#ward').html(lam);
	});
}
