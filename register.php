<?php
include('connect.php');



//declare empty variables
$first_name = '';
$last_name = '';
$email = '';
$password = '';
$repeat_password = '';
//check if the submit button is clicked
if(isset($_POST['register'])) {
    
    //record the inputs
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    //write the query
    $save_query = "INSERT INTO `register_tb`(`first_name`, `last_name`, `email`, `password`, `repeat_password`) VALUES ('$first_name','$last_name','$email','$password','$repeat_password')";


    //send the query to server
    $send_to_server = mysqli_query( $connect, $save_query);

    if($send_to_server){
        session_start();
        $_SESSION['first_name']=$first_name;
        $_SESSION['email']=$email;
        header("Location: welcome.php"); 
    }else{
        echo "Failed to register";
    };
    if($password === $repeat_password) {
        echo "Password correct";
    }else{
        echo 'incorrect password';
    }

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
    <title>Register page</title>
</head>
<body>
    <header>
        <h1 class=" black blue-text center-align">Vid.com</h1>
    </header>
    <div class="container">
        <div class="login-box center-align container">
            <form action="register.php" class="col s12 container" method="POST">
                <h3 style="text-decoration: underline;">Register</h3>
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">person</i>
                        <input id="first_name" type="text" name="first_name" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">person</i>
                        <input id="last_name" type="text" name="last_name" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mail</i>
                        <input id="icon_mail" type="email" name="email" class="validate">
                        <label for="icon_mail">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_lock" name="password" type="password" class="validate">
                        <label for="icon_lock">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_pass" name="repeat_password" type="password" class="validate">
                        <label for="icon_pass">Repeat Password</label>
                    </div>
                </div>
                <input type="submit" value="register" id="register" name="register" class="btn-flat black white-text">
                <p>Already have an account?<a href="login.php"> Sign in</a></p>
            </form>
        </div>
    </div>
    <footer class="blue page-footer">
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