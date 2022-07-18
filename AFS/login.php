<?php
    include 'config.php';

    session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location:indexclient.php");
    
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: indexclient.php");
	} else {
		echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Log In</title>
    
</head>
<body>
    <div class="bars">
        <a href="index.php" style="color:black;"><b>Home</b></a>
        <a href="aboutus.php" style="color:orangered;"><b>About Us</b></a>
        <a href="https://twitter.com" style="color:orangered;"><b>Contact</b></a>
    </div>
<div id="firstmain">
    <div class="main">
        <p>Log In to AFS</p>
        <form action="" method="POST"  id="form">
            <input type="text" name="username" id="Username" value="<?php echo $username; ?>" placeholder="Enter Username" >
                <br>
            <input type="password" name="password" id="password" value="<?php echo $_POST['password']; ?>" placeholder="Enter Password" ><br>
                <a href="signin.php" id="singin"> Sign in</a>
                <a href="" id="fopass">Foreget password</a><br>
                <p id="error" style="color: red; font-size: 10px;"></p>
            <button id="submit" name="submit">Submit</button>
        </form>
       
        <a href="https://facebook.com" target="_blank">
            <img src="foto/f.png" alt=""class="ikona1">
        </a>
        <a href="https://gmail.com" target="_blank">
            <img src="foto/g.png" alt=""class="ikona2">
        </a>
        <a href="https://twitter.com" target="_blank"> 
            <img src="foto/t.png" alt=""class="ikona3">
        </a>
    </div>
</div>
    <script type="text/javascript" src="js/login.js">
        
    </script>
</body>
</html>