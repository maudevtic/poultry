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
	//$conn = null;

    try {
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmtFetchAllUsers = $conn->query("SELECT * FROM users");
		$stmtFetchAllUsers->execute();
		$resultFetchAllUsers = $stmtFetchAllUsers->fetchAll();
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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPF|Users</title>
    <style>
        body {
			background:url(assets/images/homepagebg.jpeg) no-repeat;
            background-attachment: fixed;
            background-size: cover;
	        background-position: center;
	        font-family: sans-serif;
        }

        .button {
          background-color: #4CAF50; /* Green */
          border: none;
          color: white;
          padding: 5px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .buttonblue {background-color: #008CBA;} /* Blue */
        .buttonred {background-color: #f44336;} /* Red */ 
        .buttongray {background-color: #e7e7e7; color: black;} /* Gray */ 
        .buttonblack {background-color: #555555;} /* Black */
    </style>
</head>
<body>
    <div >
        <a href="javascript:history.back()">
            <p><img src="assets/images/back.png" alt="Cinque Terre" width="70px" height="50px"></p>
        </a>
    </div>
    <div class="bg">
        <div class="header">
            <h1><img src="assets/images/integris.png" alt="Cinque Terre" width="400px" height="80px"></h1>
        </div>
        <div class="center">
            <div class="columns">
                <span><h2>Users Management | Logged as: <?php echo ucwords($username); ?></h2></span>
            </div>
        </div>
        <div class="center">
            <div class="columns">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($resultFetchAllUsers as $rowtFetchAllUsers) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rowtFetchAllUsers['username']; ?></td>
                            <td>
                                <?php
                                    if ($rowtFetchAllUsers['type']==='0') {
                                        echo "Admin";
                                    } else {
                                        echo "User";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if ($rowtFetchAllUsers['status']==='1') {
                                        echo "Approved";
                                    } else {
                                        echo "New";
                                    }
                                ?>
                            </td>
                            <td><?php echo $rowtFetchAllUsers['created_at']; ?></td>
                            <td>
                                <?php
                                    if ($_SESSION['type']==='0' && $_SESSION['status']==='1') {
                                        if ($rowtFetchAllUsers['status']==='1') {
                                ?>
                                    <button class="button buttonblue">Approve</button>
                                    <button class="button buttongreen">Update</button>
                                    <button class="button buttonred">Delete</button>
                                <?php
                                        } else if ($rowtFetchAllUsers['status']==='0') {
                                ?>
                                    <button class="button buttongreen">Update</button>
                                    <button class="button buttonred">Delete</button>
                                <?php
                                        }
                                    } else if ($_SESSION['type']==='1') {
                                ?>
                                    <button class="button buttongreen">Update</button>
                                <?php
                                    } else if ($_SESSION['type']==='0') {
                                ?>
                                    <button class="button buttongreen">Update</button>
                                <?php
                                    }
                                ?>
                                
                            </td>
                        </tr>
                        <?php $i++;} ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</html>