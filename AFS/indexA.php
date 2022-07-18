<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleA.css">
    <title>Document</title>
</head>
<body>
    

<header>
    <a href="index.php" class="h1"><h1>AFS</h1><a>
    <a href="singinA.php"> Registre admin </a>
    <a href="logoutA.php">Log out</a>  
</header><br>

<?php echo "<h2>Welcome: " . $_SESSION['username'] . "</h2>"; ?>


    <form action="">
        <h3>INSERT A MOVIE</h3>
        <input type="text" placeholder="Movie Name" ><br>
        <textarea name="description" id="" cols="10" rows="5" placeholder="Movie Description"></textarea><br>
        <input type="file" name="foto"><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>