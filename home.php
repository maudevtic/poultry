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
    <title>IPF|Homepage</title>
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
<body >
    <div class="bg">
        <div class="header">
            <h1><img src="assets/images/integris.png" alt="Cinque Terre" width="400px" height="60px"></h1>
        </div>
        <div class ="center">
            <div class ="columns" >
                <span><h3>Logged as: <?php echo ucwords($username); ?></h3></span>
            </div>
        </div>
        <div class="center">
            <div class="columns" >
                <a href="birdreports.php">
                    <div class="hov">
                        <p><img src="assets/images/bird.png" alt="Cinque Terre" width="50px" height="40px"></p>
                        <a href="birdreports.php"><h4>Birds Reports</h4></a>
                    </div>
                </a>
                <a href="totalreport.php">
                    <div class="hov">
                        <p><img src="assets/images/reports.png" alt="Cinque Terre"  width="50px" height="40px"></p>
                        <a href="totalreport.php"><h4>Total Reports</h4></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <a href="feeds.php">
                    <div class="hov">
                        <p><img src="assets/images/feed.png" alt="Cinque Terre" width="50px" height="40px"></p>
                        <a href="feeds.php"><h4>Feeds</h4></a>
                    </div>
                </a>
                <a href="flockwise.php">
                    <div class="hov">
                        <p><img src="assets/images/flockwise.png" alt="Cinque Terre"  width="50px" height="40px"></p>
                        <a href="flockwise.php"><h4>Flockwise</h4></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="column">
                <a href="users.php">
                    <div class="hov">
                        <p><img src="assets/images/users.png" alt="Cinque Terre" width="70px" height="40px"></p>
                        <a href="users.php"><h4>Users</h4></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <a href="vaccinations.php">
                    <div class="hov">
                        <p><img src="assets/images/vaccine.png" alt="Cinque Terre"  width="50px" height="40px"></p>
                        <a href="vaccinations.php"><h4>Vaccination</h4></a>
                    </div>
                </a>
                <a href="actualvsstandard.php">
                    <div class="hov">
                        <p><img src="assets/images/vs.png" alt="Cinque Terre" width="50px" height="40px"></p>
                        <a href="actualvsstandard.php"><h4>Actual vs Standard</h4></a>
                    </div>
                </a> 
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <a href="employees.php">
                    <div class="hov">
                        <p><img src="assets/images/employee.png" alt="Cinque" Terre width="50px" height="40px"></p>
                        <a href="employees.php"><h4>Employees</h4></a>
                    </div>
                </a>
                <a href="suppliers.php">
                    <div class="hov">
                        <p><img src="assets/images/supplier.png" alt="Cinque Terre" width="50px" height="40px"></p>
                        <a href="suppliers.php"><h4>Supplier</h4></a>
                    </div>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="columns1">
                <div >
                   <form action="" method="POST">
                    <p><button class="button" name="logout"><img src="assets/images/signout.png" alt="Cinque" Terre width="58px" height="50px"></button></p><input type="submit" name="logout" id = "signout" value = "Signout">
                   </form>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>