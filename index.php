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
        <title>Welcome to Slotify!</title>
    </head>
    <body>
        Hello World!
    </body>
</html>