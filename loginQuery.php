<?php
	include "connection.php";

	if (isset($_POST['loginBtn'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		try {
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
			$result = $conn->query($sql);
			$count = $result->fetchColumn();
			if ($count>=1) {
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				header("location:home.php");
			} else {
				echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Incorrect password or username!</p>";
			}
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
	}
	if (isset($_GET['loginRequired'])) {
		echo "<p style = 'color:yellow;background:red;text-align:center;'>Authentication is Required!</p>";
	}
?>