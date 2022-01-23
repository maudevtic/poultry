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
    <title>IPF|Birds Report</title>
    <style>
        body {
			background:url(assets/images/homepagebg.jpeg);
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
        <div class="header">
            <h1><img src="assets/images/integris.png" alt="Cinque Terre" width="400px" height="80px"></h1>
        </div>
        <div class="center">
            <div class="columns">
                <span><h2>Birds Report | Logged as: <?php echo ucwords($username); ?></h2></span>
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <a href="javascript:history.back()">
                    <div class="hov">
                        <p><img src="assets/images/back.png" alt="Cinque Terre" width="70px" height="50px"></p>
                        <a href="javascript:history.back()"><h3>Back</h3></a>
                    </div>
                </a>
                <a href="costperbird.php">
                    <div class="hov">
                        <p><img src="assets/images/bird.png" alt="Cinque Terre" width="50px" height="50px"></p>
                        <a href="costperbird.php"><h3>COST/BIRD & RETURN BIRD DETAILS</h3></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <a href="brooderweeklyreport.php">
                    <div class="hov">
                        <p><img src="assets/images/bird.png" alt="Cinque Terre" width="50px" height="50px"></p>
                        <a href="brooderweeklyreport.php"><h3>BROODER WEEKLY REPORT</h3></a>
                    </div>
                </a>
                <a href="costperchickreport.php">
                    <div class="hov">
                        <p><img src="assets/images/chic.png" alt="Cinque Terre" width="50px" height="50px"></p>
                        <a href="costperchickreport.php"><h3>COST PER CHICK REPORT</h3></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <a href="mortalityreport.php">
                    <div class="hov">
                        <p><img src="assets/images/bird.png" alt="Cinque Terre" width="50px" height="50px"></p>
                        <a href="mortalityreport.php"><h3>MORTALITY</h3></a>
                    </div>
                </a>
                <a href="birdtranferreport.php">
                    <div class="hov">
                        <p><img src="assets/images/bird.png" alt="Cinque Terre" width="50px" height="50px"></p>
                        <a href="birdtranferreport.php"><h3>BIRD TRANSFER</h3></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="columns1">
                <div>
                    <form action="" method="POST">
                        <p><button class="button" name="logout"><img src="assets/images/signout.png" alt="Cinque" Terre width="58px" height="50px"></button></p>
                        <input type="submit" name="logout" id="signout" value="Signout">
                   </form>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>