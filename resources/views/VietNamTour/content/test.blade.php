<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="resource/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<h1>Testx</h1>
	
	<div class="" id="display-city">
		
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
			$.ajax({
					url: 'http://chinhlytailieu/doan3_canthotour/public/lamindex/',
					type: 'GET',
					data:{id:'171'}
				}).done(function(response){
					console.log(response);
					var data = $.parseJSON(response);
					console.log(data[0].sv_id);
			});
			console.log("lam");
			$.getJSON("http://chinhlytailieu/doan3_canthotour/public/lamindex/id=171",function(data) {
				console.log(data[0].sv_name);
			})
		})
	</script>
</body>
</html>