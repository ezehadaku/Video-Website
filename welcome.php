<?php
include('connect.php');
session_start();

//Redirect users to login page if they try to access welcome page
if(!$_SESSION['email']){
  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="shortcut icon" href="img/logo 2.jpeg" type="image/x-icon">
    <title>welcome</title>
</head>
<body>
  <div class="container">
    <h1>Welcome <?php echo $_SESSION['first_name'];?> !!</h1>
    <h6>You have successfully registered on vid.com,below are your details:</h6>
    <p>First Name: <?php echo $_SESSION['first_name'];?></p>
    <p> Your email <?php echo $_SESSION['email'];?></p>
    <p>Click the login button below to login.</p>
  <a href="login.php" class="btn"> Login</a>
  </div>
</body>
</html>