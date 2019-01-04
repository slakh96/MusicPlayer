<?php
    //session_destroy()//To logout manually
    include('includes/config.php');
    if (isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }
    else{
        header("Location: register.php");//send them to login/register if they are not logged in
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/grid.css">
        <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    </head>
    <body>
        <div class="mainContainer"><!---Houses all stuff---->
            
            <div class="topContainer"><!--Houses all stuff except now playing bar--->
                <?php
                    include("includes/navbarContainer.php");
                ?>
                <div class="mainView">
                
                </div>
            </div>
            <?php
                include("includes/nowPlayingContainer.php");
            ?>
        </div>
    </body>
</html>