<?php
    include 'config2.php';

    error_reporting(0);

    session_start();

    if (isset($_POST['submit'])) {
    
	$email = $_POST['email'];
	$username = $_POST['username'];
    $password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
		$sql = "SELECT * FROM admins WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admins ( email, username, password)
					VALUES ( '$email', '$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$email = "";
                $username = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
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
    <link rel="stylesheet" type="text/css" href="css/loginA.css">
    <title>Document</title>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="indexA.php">Home</a>
            </li>
        </ul>
    </header>
    <div id="main">
    <form action="" method="POST">
        <h3>Register Admin</h3>
        <input type="email" name="email" id="email" class="tedhenat" value="<?php echo $email; ?>" placeholder="Enter e-mail"><br>
        <input type="text" name="username" id="username" class="tedhenat" value="<?php echo $username; ?>" placeholder="Enter username"><br>
        <input type="password" name="password" id="password" class="tedhenat" value="<?php echo $_POST['password']; ?>" placeholder="Enter password"><br>
        <input type="password" name="cpassword" id="cpassword" class="tedhenat" value="<?php echo $_POST['cpassword']; ?>" placeholder="Confirm password"><br>
        <input type="submit" name="submit"id="submit" value="Submit" >
    </form>
</div>
</body>
</html>