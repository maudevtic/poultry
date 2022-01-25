<?php
	include "connection.php";

	if (isset($_POST['caccountupdateBtn'])) {
    $id = $_POST['id'];
		$user = $_POST['usernameedit'];
		$pass = $_POST['passwordedit'];
		$cpass = $_POST['cpasswordedit'];
    $type = $_POST['typeedit'];

    if ($_POST['passwordedit']===$_POST['cpasswordedit']) {
			try {
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE users SET username='$user', password='$pass', type='$type' WHERE id='$id' ";
				$conn->exec($sql);
				echo "
					<script>
						alert('Sucessfully Updated.');
						window.location.href='users.php';
					</script>
				";
			} catch(PDOException $e) {
				$sql . "<br>" . $e->getMessage();
				echo "<script>alert(".$sql . "<br>" . $e->getMessage().");</script>";
			}
    } else {
      echo "<script>
							alert('Password and Confirm Pasword is not match.');
						</script>";
    }
	}
?>