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
    </head>
    <body>    
       <div class="nowPlayingBarContainer">
            <div class="nowPlayingBar">
                <div class="nowPlayingLeft">
                    
                </div>
                <div class="nowPlayingCenter">
                    <div class="content playerControls">
                        <div class="buttons">
                            <button>Hellow</button>
                        </div>
                    </div>
                </div>
                <div class="nowPlayingRight">
                    
                </div>
            </div>
        </div>
    </body>
</html>