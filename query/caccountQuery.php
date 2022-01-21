<?php
	include "connection.php";

	if (isset($_POST['caccountBtn'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
    $type = $_POST['type'];
		try {
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO users (username, password, type) VALUES ('$user', '$pass', '$type')";
			$conn->exec($sql);
			echo "New record created successfully";
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
		header("location:caccount.php");
	}
?>