<?php
    session_start();
    include 'connection.php';

    $user = $_SESSION['username'];
    $pass = $_SESSION['password'];

    if(!isset($user) && !isset($pass)){
        header("location:index.php?loginRequired");
    }
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("location:index.php");
    }

    $user_qry = mysqli_query($con, "SELECT * FROM users WHERE username = '$user' AND password = '$pass'");

    while($user_info = mysqli_fetch_assoc($user_qry)){
        $username = $user_info['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet" type = "text/css" href = "assets/css/homepage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        	body{
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
    <div class ="bg">
    <div class = "header">
        <h1><img src="assets/images/integris.png" alt="Cinque Terre" width="400px" height="80px"></h1>
    </div>
     <div class ="center">
        <div class ="columns" >
            <span>Logged as: <?php echo ucwords($username); ?></span>
        </div>
    </div>
    <div class ="center">
        <div class ="columns" >
            <div class = "hov">
                <p><a href="birdreports.php"><img src="assets/images/bird.png" alt="Cinque Terre" width="50px" height="50px"></a></p>
                <a href="birdreports.php">Birds Reports</a>
            </div>  
            <div class="hov">
                <p><a href="#"><img src="assets/images/reports.png" alt="Cinque Terre"  width="50px" height="50px"></a></p>
                <a href="#">Total Reports</a>
            </div>  
        </div>
        
    </div>
    <div class="center">
        <div class="columns" >
            <div class="hov">
                <p><a href="feedsmanagement.php"><img src="assets/images/flockwise.png" alt="Cinque Terre" width="50px" height="50px"></a></p>
                <a href="feedsmanagement.php">Feeds</a>
            </div>  
            <div class="hov">
                <p><a href="flockwise.php"><img src="assets/images/flockwise.png" alt="Cinque Terre"  width="50px" height="50px"> </a> </p>
                <a href="flockwise.php">Flockwise</a>
            </div>  
        </div>
        
    </div>
    <div class="center">
        <div class="columns" >
            <div class="hov">
                <p><a href=""><img src="assets/images/vaccine.png" alt="Cinque Terre"  width="50px" height="50px"></a></p>
                <a href="">Vaccination</a>
            </div>  
            <div class="hov">
               <p> <a href=""><img src="assets/images/vs.png" alt="Cinque Terre" width="50px" height="50px"></a></p>
                    <a href="">Actual vs Standard</a>
            </div>  
        </div>
        
    </div>
    <div class ="center">
        <div class ="columns" >
            <div class = "hov">
               <p> <a href=""><img src="assets/images/employee.png" alt="Cinque" Terre width="50px" height="50px"></a></p>
                <a href>Employees</a>
            </div>  
            <div class="hov">
               <p> <a href=""><img src="assets/images/supplier.png" alt="Cinque Terre" width="50px" height="50px"></a></p>
                    <a href="">Supplier</a>
            </div>  
        </div>
        
    </div>
    <div class="center">
        <div class="columns1">
            <div >
              
               <form action="" method="POST">
                <p><button class="button" name="logout"><img src="assets/images/signout.png" alt="Cinque" Terre width="58px" height="50px"> </button></p>
                    <input type="submit" name="logout" id = "signout" value = "Signout">
               </form>
             

            </div>  
        </div>
    </div>
    </div>
</body>
</html>