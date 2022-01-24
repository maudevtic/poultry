<?php
	include "connection.php";

	if (isset($_POST['caccountBtn'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$cpass = $_POST['cpassword'];
    $type = $_POST['type'];
		if (!empty($_POST['username']) || !empty($_POST['password']) || !empty($_POST['cpassword']) || !empty($_POST['type'])) {
			if ($_POST['password']===$_POST['cpassword']) {
				try {
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$result = $conn->query("SELECT COUNT(*) FROM users WHERE username='$user'");
					$count = $result->fetchColumn();
					if ($count==0) {
						try {
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "INSERT INTO users (username, password, type, status) VALUES ('$user', '$pass', '$type', 0)";
							$conn->exec($sql);
							echo "
								<script>
									alert('Sucessfully Sign up. Wait your account to be approve.');
									window.location.href='index.php';
								</script>
							";
						} catch(PDOException $e1) {
							$sql . "<br>" . $e1->getMessage();
							echo "<script>alert(".$sql . "<br>" . $e1->getMessage().");</script>";
						}
					} else {
						echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Email/Username is existed</p>";
					}
				} catch(PDOException $e) {
					echo $result . "<br>" . $e->getMessage();
				}
			} else {
				echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Password and Confirm Pasword is not match.</p>";
			}
		} else if ($_POST['type']===NULL || $_POST['type']==="") {
			echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Please input Type.</p>";
		} else if ($_POST['password']===NULL || $_POST['password']==="") {
			echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Please input Password.</p>";
		} else if ($_POST['cpassword']===NULL || $_POST['cpassword']==="") {
			echo "<p style = 'color:yellow;background:red;text-align:center;padding:2px 0 2px 0'>Please input Confirm Password.</p>";
		}
	}
?>