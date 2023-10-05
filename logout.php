<?php
session_start();    
// Logout function

unset($_SESSION['email']);
unset($_SESSION['first_name']);

header('Location: login.php');
?>