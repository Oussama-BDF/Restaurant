<?php
    $server = "localhost";
    $user = "root";
    $psswd = "password";
    $db = "myRestaurant";

    $conn = mysqli_connect($server, $user, $psswd, $db);
    if(!$conn){
        die("Connection failed" . mysqli_connect_error($conn));
    }