<?php
include('connect.php');
session_start();

$s_query = "SELECT * FROM  upload_tb"; 

//if true run the query below
$r = mysqli_query($connect,$s_query);

//store result in an associative array
$videos = mysqli_fetch_all($r,MYSQLI_ASSOC);


//Redirect users to login page if they try to access landing page
if(!$_SESSION['email']){
    header('Location: login.php');
}

//declare empty variable
$vid_id ='';
//check if variable is set
if(isset($_GET['vid_id'])) {
    $vid_id = $_GET['vid_id'];
    
     //write the query
     $select_single_data = "SELECT * FROM `upload_tb` WHERE vid_id = '$vid_id'";
    
     //send query to db
    $send_query = mysqli_query($connect, $select_single_data);
    
     //store result as associative array
    $video = mysqli_fetch_assoc($send_query);


};

if(isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];
    
    
     //write the query
    $delete_data = "DELETE FROM `upload_tb` WHERE vid_id = '$delete_id'";
    
     //send query to db
    $send_query = mysqli_query($connect, $delete_data);

    if($delete_data){
        header('location: home.php');
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
    <title>Video website</title>
    <style>
        .flex-gap{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px ;
        }

        .up-99 {
            z-index: 1000;
        }
    </style>
</head>
<body>
    <header>
        
    <div class="navbar-fixed">
        <nav class="black lighten-5">
            <div class="nav-wrapper">
                <div class="container">
                    <ul class="right flex-gap">
                        <li><a href="logout.php" ><i class="material-icons">logout</i></a></li>
                        <li><a href="upload.php" ><i class="material-icons">upload_file</i></a></li>
                        <li class="tooltipped up-99" data-position="bottom" data-tooltip="Playlist"><a href="" ><i class="material-icons">video_library</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="slider" style="margin-top: 0px;padding-top: 0px;">
        <ul class="slides">
            <li>
                <img src="img/spiderman 2.jpg" alt="">
            </li>
            <li>
                <img src="img/groot.jpg" alt="">
            </li>
            <li>
                <img src="img/end game.jpg" alt="">
            </li>
            <li>
                <img src="img/warlord.jpg" alt="">
            </li>
            <li>
                <img src="img/anime.jpg" alt="">
            </li>
        </ul>
    </div>
    </header>
<div class="container">
    <h3>Welcome <?php echo $_SESSION['first_name'];?></h3>
    <div class="container">
    <form style="padding: 15px; margin: 20px;">
        <input type="search" name="search" id="srch" placeholder="search...">
    </form>
    </div>
    <div style="padding: 10px;">
        <i class="chip">BTS</i>
        <i class="chip">Live</i>
        <i class="chip">Html</i>
        <i class="chip">News</i>
        <i class="chip">Music</i>
        <i class="chip">recently uploaded</i>
    </div>
    <hr>    
</div>
    <main>
    <div class="container">
        <h4 class="black-text">Recent Uploads</h4>
        <div class="row" >
            <?php foreach ($videos as $video){?>
            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="<?php echo $video['image_link']?>" class="responsive-img materialboxed"
                        data-caption="">
                    </div>
                    <div class="card-content">
                        <span class="card-title black-text"><?php echo $video['vid_title']?></span>
                        <i class="chip"><?php echo $video['tags']?></i>
                    </div>
                    <div class="card-action">
                        <a href="<?php echo $video['video_link']?>" class="blue-text">PLAY NOW</a>
                        <form action="home.php" method="POST" style="display: inline">
                            <input type="text" name="delete_id" id="delete_id"  hidden value="<?php echo $video['vid_id'];?>">
                            <input type="submit" value="delete" name="delete" class="red white-text btn-small">
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    </main>
    <footer class="black page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 m2 l6 hoverable">
                    <img src="img/logo 2.jpeg" alt="logo" width="10%">
                    <h6 class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
                    <h6 class="white-text"> Aliquam, tenetur officiis veniam dolore itaque esse porro deserunt.</h6>
                    <h6 class="white-text"> Nemo assumenda hic at.</h6>
                </div>
    
                <div class="col s12 m2 l6 hoverable left-align" style="padding-left: 200px; padding-bottom: 20px;">
                    <h4 class="white-text"> Quick Links</h4>
                    <br>
                    <h6 class="white-text"><a href="home.php" class="white-text">Home</a></h6>
                    <h6 class="white-text"><a href="login.php" class="white-text">Login</a></h6>
                    <h6 class="white-text"><a href="#" class="white-text">About Us</a></h6>
                </div>
            </div>
        </div>
        <div class="footer-copyright blue">
            <div class="container center-align center">
                <h6 class="white-text">2023 vid.com|<a href="https://github..com/coresystechng" class="white-text">CORE-TECH</a></h6>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slider({
                height:600,
                indicators: false
            });
            $('.collapsible').collapsible();
            $('.modal').modal();
            $('.materialboxed').materialbox();
            $('.parallax').parallax();
            $('.chips').chips();
            $('.tooltipped').tooltip();
        });
    </script>
</body>
</html>