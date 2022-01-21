
<!DOCTYPE html>
<html>
<head>
	<title>INTERGRIS POULTRY FARM</title>
	<link rel = "stylesheet" type = "text/css" href = "assets/css/style.css">
	<style type="text/css">
		body {
			background:url(assets/images/loginBackground.jpg);
			margin: 0;
			padding: 0;
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
		}
	</style>
</head>
<body>
	<div class="bg">
		<div class = "loginbox">
			<img src = "assets/images/loginIcon.png" class = "avatar">
				<h1>INTEGRIS POULTRY FARM</h1>
					<?php include "loginQuery.php"; ?>
					<form action = "" method = "POST">
						<p>Username</p>
						<input type = "text" name = "username" placeholder= "Enter Username"><br/>
						<p>Password </p>
						<input type = "password" name = "password" id ="myInput" placeholder = "Enter Password" ><br/>
						<input type = "submit" name = "loginBtn" value = "Login">
						<br/>
						<a href="#" onclick="myFunction()">Show password</a><br>
					</form> 
		</div>
	</div>
</body>
</html>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>