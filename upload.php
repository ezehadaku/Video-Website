<?php
include('connect.php');

session_start();

//Redirect users to login page if they try to access landing page
if(!$_SESSION['email']){
    header('Location: index.php');
}

//Redirect users to login page if they try to access landing page
if(!$_SESSION['email']){
    header('Location: login.php');
}

//declare empty variables
$vid_title= '';
$image_link = '';
$video_link = '';
$tags = '';
//check if the submit button is clicked
if(isset($_POST['submit'])) {
    //record the inputs
    $vid_title = $_POST['vid_title'];
    $image_link= $_POST['image_link'];
    $video_link= $_POST['video_link'];
    $tags = $_POST['tags'];

    //write the query
    $save_query = "INSERT INTO `upload_tb`(`vid_title`, `image_link`, `video_link`, `tags`) VALUES ('$vid_title', '$image_link','$video_link', '$tags')";
    //send the query to server
    $send_to_server = mysqli_query( $connect,$save_query);
    //check if the data is saved to the database
    if ($send_to_server){
        header('Location: home.php');
    }
    else {
        echo 'Error to save data' . mysqli_error($connect);
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
    <title>upload page</title>
<body>
    <div class="container">
    <h2 class="center-align black-text container">Upload</h2>
        <form action="upload.php" method="POST" class="container">
            <label>Title</label>
            <input type="text" name="vid_title" placeholder="Title" required>
            <label>Image-link</label>
            <input type="text" name="image_link" placeholder="image-link" required>
            <label>Video-link</label>
            <input type="text" name="video_link" placeholder="video-link" required>
            <label>Tag</label>
            <input type="text" name="tags" placeholder="tag" required>
            <input type="submit" name="submit" id="submit" class="btn">
        </form> 
    </div>
</body>
</html>