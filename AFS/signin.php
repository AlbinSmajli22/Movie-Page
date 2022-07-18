<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $name = $_POST['emri'];
    $surname = $_POST['mbiemri'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    

    if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE Username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (Emri, Mbiemmri, Username, Password)
					VALUES ('$name','$surname', '$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$name = "";
                $surname = "";
                $username = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! User Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Sign In</title>
    
</head>
<body>
    <div class="bars">
        <a href="index.php" style="color:black;"><b>Home</b></a>
        <a href="aboutus.php" style="color:orangered;"><b>About Us</b></a>
        <a href="https://twitter.com" style="color:orangered;"><b>Contact</b></a>
    </div>
<div id="firstmain">
    <div class="main">
        <p>Sign In to AFS</p>
        <form action= "" method="POST" id="form">
        <input type="text" name="emri" id="emri" value="<?php echo $name; ?>" placeholder="Enter Name" >
        <br>
        <input type="text" name="mbiemri" id="mbiemri" value="<?php echo $surname; ?>" placeholder="Enter Surname">
        <br>
        <input type="text" name="username" id="Username" value="<?php echo $username; ?>" placeholder="Enter Username">
        <br>
        <input type="password" name="password" id="password" value="<?php echo $_POST['password']; ?>" placeholder="Enter Password" >
        <br>
        <input type="password" name="cpassword" id="Confirmpassword" value="<?php echo $_POST['cpassword']; ?>" placeholder="Confirm Password" >
        <br>
        <p id="error"></p>
        <br>
        <button name="submit" id="submit">Submit</button>
        </form>
       
    </div>
</div>
    <script type="text/javascript" src="js/main.js">
        
    </script>
</body>
</html>