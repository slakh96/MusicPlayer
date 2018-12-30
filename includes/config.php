<?php
    ob_start();
    session_start(); //Enables sessions to work
    $timezone = date_default_timezone_set("America/Toronto");
    $con = mysqli_connect("localhost", "root", "", "musicPlayer");//server name, username, password, and database
    if(mysqli_connect_errno()){
        echo "Failed to connect with mysql: " . mysqli_connect_errno(); //period is to append strings
    }
?>