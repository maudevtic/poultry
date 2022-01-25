<?php
	include "../connection.php";
  $id = $_GET['id'];

	try {
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM users WHERE id='$id' ";
		$conn->exec($sql);
		echo "
			<script>
				alert('Sucessfully Deleted.');
				window.location.href='../users.php';
			</script>
		";
	} catch(PDOException $e) {
		$sql . "<br>" . $e->getMessage();
		echo "<script>alert(".$sql . "<br>" . $e->getMessage().");</script>";
	}

?>