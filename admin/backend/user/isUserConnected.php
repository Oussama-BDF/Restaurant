<?php 
    // check if the user is connected or not, we included this function in layouts header
    session_start();

    if(basename($_SERVER['PHP_SELF']) == "signin.php" || basename($_SERVER['PHP_SELF']) == "signup.php" || basename($_SERVER['PHP_SELF']) == "index.php"){
        if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
            header("Location:  ". $BASE_URL . "home.php");
            exit();
        } 
    }
    else {
        if (!isset($_SESSION['id']) && !isset($_SESSION['email'])) {
            header("Location:  ". $BASE_URL . "index.php");
            exit();
        } 
    }
    
?>