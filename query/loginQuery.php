<?php
	include "connection.php";

	if (isset($_POST['loginBtn'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		try {
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $conn->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
			$count = $result->fetchColumn();
			$result->execute();
			$result1 = $result->fetch();
			if ($count>=1 && $result1['status'] == 1) {
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				$_SESSION['id'] = $result1['id'];
				$_SESSION['status'] = $result1['status'];
				$_SESSION['type'] = $result1['type'];
				echo "<script>alert('Sucessfully Login.');window.location.href='home.php';</script>";
			} else if ($count>=1) {
				echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Your account is not yet approve.</p>";
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