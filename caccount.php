
<!DOCTYPE html>
<html>
<head>
	<title>IPF|Create Account</title>
	<link rel = "stylesheet" type = "text/css" href = "assets/css/style.css">
	<style type="text/css">
    body, html {
      height: 100%;
      margin: 0;
    }

    .loginbox{
    	width: 320px;
    	height: 420px;
    	background: #000;
    	color: #fff;
    	top: 50%;
    	left: 50%;
    	position: absolute;
    	transform: translate(-50%, -50%);
    	box-sizing:border-box;
    	padding: 70px 30px;
    
    } 

    .avatar{
    	width: 100px;
    	height: 100px;
    	border-radius: 50%;
    	position: absolute;
    	top: -50px;
    	left: calc(50% - 50px);
    
    }
    h1{
    	margin: 0;
    	padding: 0 0 20px;
    	text-align: center;
    	font-size: 22px; 
    }
    .loginbox p{
    	margin: 0;
    	padding: 0;
    	font-weight: bold;
    }

    .loginbox input{
    	width: 100%;
    	margin-bottom: 20px;
    }

    .loginbox input[type = "text"], input[type = "password"]
    {
    	border: none;
    	border-bottom: 1px solid #fff;
    	background: transparent;
    	outline: none;
    	height: 40px;
    	color: #fff;
    	font-size: 16px;
    }
    .loginbox input[type = "submit"]
    {
    	border: none;
    	outline: none;
    	height: 40px;
    	background: #13aec0;
    	color: black;
    	font-size: 18px;
    	border-radius: 20px;
    } 

    .loginbox input[type = "submit"]:hover
    {
    	cursor:pointer;
    	background: #65cca2; 	
    	color: white;
    }
    .loginbox a{
    	text-decoration:none;
    	font-size: 12px;
    	line-height: 20px;
    	color : darkgrey;
    }
    .loginbox input[type = "checkbox"]{
    	float:right;
    }
    
		body {
			background:url(assets/images/loginBackground.jpg);
			margin: 0;
			padding: 0;
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
		}
		/* The container must be positioned relative: */
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
	</style>
</head>
<body>
	<div class="bg">
		<div class="loginbox">
			<img src="assets/images/loginIcon.png" class="avatar">
				<h1>INTEGRIS POULTRY FARM</h1>
					<?php include "query/caccountQuery.php"; ?>
					<form action="" method="POST">
						<p>Email</p>
						<input type="text" name="username" placeholder="Enter your E-mail"><br/>
						<p>Password</p>
						<input type="password" name="password" id="password" placeholder="Enter your Password"><br/>
            <p>Confirm Password</p>
						<input type="password" name="cpassword" id="password" placeholder="Confirm your Password"><br/>
						<select class="custom-select" style="width:200px;" name="type">
  					  <option value="0">Admin</option>
  					  <option value="1">User</option>
  					</select>
						<input type="submit" name="caccountBtn" value="Save">
						<br/>
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