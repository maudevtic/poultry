<?php
    session_start();
    include 'connection.php';
    $user = $_SESSION['username'];
    $pass = $_SESSION['password'];
    if (!isset($user) && !isset($pass)) {
        header("location:index.php?loginRequired");
    }

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("location:index.php");
    }

    try {
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $conn->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
		$statement->execute();
		$result = $statement->fetch();
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
    $username = $result['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/homepage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPF|Bird Transfer Report</title>
    <style>
        body {
			background:url(assets/images/underConstruction.webp);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
	        background-position: center;
	        font-family: sans-serif;
        }
    </style>
</head>
<body>
    <!-- <div class="bg">
        <div class="header">
            <h1><img src="assets/images/integris.png" alt="Cinque Terre" width="400px" height="80px"></h1>
        </div>
        <div class="center">
            <div class="columns">
                <span>Bird Transfer Report | Logged as: <?php echo ucwords($username); ?></span>
            </div>
        </div>
    </div> -->
</body>
</html>