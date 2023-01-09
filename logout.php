<?php 
session_start();

if(isset($_SESSION['username'])) {

    unset($_SESSION['username']);
    unset($_SESSION['rang_utilizatori']);
    
}

header("Location:licenta2.php");
die;
