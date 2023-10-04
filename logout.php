<?php
session_start();    
// Logout function

unset($_SESSION['email']);
header('Location: login.php');
?>