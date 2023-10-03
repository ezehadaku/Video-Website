<?php
include('connect.php');
//declare empty variables
$title= '';
$image_link = '';
$tags = '';
//check if the submit button is clicked
if(isset($_POST['submit'])) {
    //record the inputs
    $title = $_POST['title'];
    $image_link= $_POST['image_link'];
    $tags = $_POST['tags'];

    //write the query
    $save_query = "INSERT INTO `upload_tb`(`title`, `image_link`,`tags`) VALUES ('$title', '$image_link', '$tags')";
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
        <h2 class="center-align black-text">Upload</h2>
        <form action="upload.php" method="POST">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title">
            <label>Image-link</label>
            <input type="text" name="image_link" placeholder="image-link">
            <label>Tag</label>
            <input type="text" name="tags" placeholder="tag">
            <input type="submit" name="submit" id="submit">
        </form> 
    </div>
</body>
</html>