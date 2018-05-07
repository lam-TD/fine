$(document).ready(function () {
	
})

function login() {
	var username = $('$txtuser').val();
	var password = $('$txtpass').val();
	if (username == "" || password == "") 
	{
		$('#thongbao').css('display','block');
	}
	else
	{
		window.location.href = 'loginpost';
	}
}