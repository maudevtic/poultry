<?php
	include "connection.php";

		if(isset($_POST['loginBtn'])){
			$user = $_POST['username'];
			$pass = $_POST['password'];

				$sql = mysqli_query($con, "SELECT * FROM users WHERE username = '$user' AND password = '$pass'");

							$row = mysqli_num_rows($sql);

								if($row>=1){
								session_start();

								$_SESSION['username'] = $user;
								$_SESSION['password'] = $pass;
								header("location:home.php");
							}
							else{
								echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Incorrect password or username!</p>";
							}
						}
						if(isset($_GET['loginRequired'])){
								echo "<p style = 'color:yellow;background:red;text-align:center;'>Authentication is Required!</p>";
							}
?>