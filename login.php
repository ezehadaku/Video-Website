<?php
include('connect.php');



//declare empty variables
$email = '';
$repeat_password = '';
//check if the submit button is clicked
if(isset($_POST['login'])) {
    
    echo "Running registration";
    
    //record the inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    //write the query
    $save_query = "INSERT INTO `login_tb`(`email`, `password`) VALUES ('$email','$password')";


    //send the query to server
    $send_to_server = mysqli_query( $connect, $save_query);

    if($send_to_server){
        echo "Login successfully";
    }else{
        echo "Failed to login";
    };

    //check if the data is saved to the database
    mysqli_close($connect);
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
        <div class="login-box center-align">
            <form action="login.php" class="col s12" method="POST">
                <h3 style="text-decoration: underline;">Login</h3>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_mail" type="email" class="validate">
                        <label for="icon_mail">Email</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_lock" type="password" class="validate">
                        <label for="icon_lock">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <p>
                            <label class="left-align">
                                <input type="checkbox" class="filled-in" checked="checked" />
                                <span class="bl">Remember me</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s6">
                        <p><a href="#" class="grey-text">forgot password</a></p>
                    </div>
                </div>
                <input type="submit" value="login" id="login" name="login" class="btn-flat black white-text">
                <p>Not registered?<a href="register.html">Sign Up</a></p>
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