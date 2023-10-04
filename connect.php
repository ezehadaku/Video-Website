<?php
$connect = mysqli_connect('localhost','adaku','1234','vid_db');

//check connection
if(!$connect){
    echo 'could not connect';
}
?>