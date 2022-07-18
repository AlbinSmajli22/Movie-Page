<?php 

include 'config2.php';

session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location:indexA.php");
    # code...
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: indexA.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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
                <a href="index.php">Home</a>
            </li>
        </ul>
    </header>
    <div id="main">
    <form action="" method="post">
        <h3>Login as Admin</h3>
        <input type="email" name="email" id="email" class="tedhenat" value="<?php echo $email; ?>" placeholder="Enter e-mail"><br>
        <input type="password" name="password" id="password" class="tedhenat" value="<?php echo $_POST['password']; ?>" placeholder="Enter password"><br>
        <input type="submit" name="submit"id="submit" value="Submit" >
    </form>
    </div>
</body>
</html>