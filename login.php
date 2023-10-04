<?php
include('connect.php');

$email = $password = '';

//if the login button is clicked
if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

// query to recieve login details
    $s_query = "SELECT * FROM  register_tb WHERE email = '$email'";

    //check if the values are the sae with the db
    if (mysqli_num_rows(mysqli_query($connect,$s_query))>0) {

        //if true run the query below
        $r = mysqli_query($connect,$s_query);

        //store result in an associative array
        $recieve_result = mysqli_fetch_assoc($r);

        //extract password from receive result
        $password = $recieve_result['password'];

        //do an if check to check if password is the same as the password in the database
        if($password === $_POST['password']) {
            header('location: welcome.php');
        }else{
            echo 'incorrect password and username';
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="shortcut icon" href="img/logo 2.jpeg" type="image/x-icon">
    <title>login page</title>
</head>
<body>
    <header>
        <h1 class=" black blue-text center-align">Vid.com</h1>
    </header>
    <div class="container">
        <div class="login-box  container center-align">
            <form action="login.php" class="col s12 container" method="POST">
                <h3 style="text-decoration: underline;">Login</h3>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_mail" type="email" name="email" class="validate" required>
                        <label for="icon_mail">Email</label>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_lock" type="password" name="password" class="validate" required>
                        <label for="icon_lock">Password</label>
                    </div>
                </div>
                <input type="submit" value="login" id="login" name="login" class="btn-flat black white-text">
                <p>Not registered?<a href="register.php">Sign Up</a></p>
            </form>
        </div>

    </div>
    <footer class="black page-footer">
        <div class="footer-copyright blue">
            <div class="container center-align center">
                <h6 class="white-text">2023 vid.com|CORE-TECH </h6>
            </div>
        </div>
    </footer>
</body>
</html>
    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <script>
        $(document).ready(function(){
            M.updateTextFields();
        });
    </script>
</body>
</html>