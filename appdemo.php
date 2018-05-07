<!-- <form action="http://localhost/doan3/public/loaihinhsukien/2" method="post">
	<input type="hidden" name="_method" value="PUT">
	<input type="text" name="txttenloaihinh">
	<input type="submit" >
</form> -->

<!-- vui choi -->
<form action="http://chinhlytailieu/doan3_canthotour/public/login2" method="post" enctype="multipart/form-data">
	<!-- <input type="hidden" name="_method" value="PUT"> -->
	<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
	<input type="text" name="username"> <br>
	<input type="text" name="password">	<br>
	<label>Quốc gia:</label>
	<select name="country">
		<option value="viet nam">viet nam</option>
		<option value="My">My</option>
	</select>
	
	<br>

	<label>Ngôn ngữ:</label>
	<select name="language">
		<option value="viet nam">viet nam</option>
		<option value="My">My</option>
	</select>
	<br>
	<input type="submit">
</form>

<!-- delete -->
<!-- <form action="http://localhost:6789/doan3/public/vuichoi/5" method="post">
	<input type="hidden" name="_method" value="delete">
	<input type="submit" >
</form> -->