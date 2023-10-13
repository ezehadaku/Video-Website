<?php
//connect to database
include('connect.php');

session_start();

//Redirect users to login page if they try to access update page without login
if(!$_SESSION['email']){
    header('Location: login.php');
}

//declare empty variable
$vid_id ='';
//check if variable is set
if(isset($_GET['vid_id'])) {
    $vid_id = $_GET['vid_id'];
    // echo $vid_id;

    //write the query
    $select_single_data = "SELECT * FROM `upload_tb` WHERE vid_id = '$vid_id'";
    
    //send query to db
    $send_query = mysqli_query($connect, $select_single_data);
    
    //store result as associative array
    $video = mysqli_fetch_assoc($send_query);
    // print_r($video);
    //close the connection 
}

//declare empty variable for new vid title
$update_vid_name = '';

//check if the update button is clicked
    if(isset($_POST['update'])){

        //store input in declared varable
        $update_vid_name = $_POST['update_vid_name'];

        //Write Uodate query
        $sql = "UPDATE `upload_tb` SET `vid_title` = '$update_vid_name'";

        //Check if the query is true, then redirect to homepage
        if(mysqli_query($connect, $sql)){
            header('location: home.php');
        } else {
            echo 'error'  . mysqli_connect_error($connect);
        }
    }
    //close connection
    mysqli_close($connect);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="shortcut icon" href="img/logo 2.jpeg" type="image/x-icon">
    <title>update page</title>
</head>
<body>
<h1>Update</h1>
<div class="container">
<form action="update.php" method="GET" class="container center-align">
    <label>Video title</label>
    <input type="text" name="update_vid_name" placeholder="<?php echo $video['vid_title']?>">
    <input type="submit" value="update" name="update" class="btn">
</form>
</div>

</html>