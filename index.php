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
                <div class="navContainer"><!---Left bar nav---->
                    <nav class="navBar">
                        <a href="index.php" class="logo"><img src="assets/images/icons/icons8_Snowflake_75px.png"></a>
                        <div class="group"><!--Search bar--->
                            <div class="navItem">
                                <a href="search.php" class="navItemLink">Search
                                <img src="assets/images/icons/icons8_Circled_Play_50px.png" class="icon" alt="search" ></a>
                            </div>
                        </div>
                        <div class="group"><!---Quick links--->
                            <div class="navItem">
                                <a href="#" class="navItemLink">Browse</a>
                            </div>
                            <div class="navItem">
                                <a href="#" class="navItemLink">My Music</a>
                            </div>
                            <div class="navItem">
                                <a href="#" class="navItemLink">My Profile</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            
            <div class="nowPlayingBarContainer">
            <div class="nowPlayingBar">
                <div class="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArt" src="assets/images/album-art-sonu.jpg">
                        </span>
                        <div class="trackInfo">
                            <span class="trackName">
                                <span>Sapna Jahan</span>
                            </span>
                            <span class="trackArtist">
                                <span>Sonu Nigam</span>
                            </span>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="nowPlayingCenter">
                    <div class="content playerControls">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="Shuffle" alt="Shuffle"><img src="assets/images/icons/icons8_Shuffle_25px.png"></button>
                            
                            <button class="controlButton rewind" title="rewind" alt="rewind"><img src="assets/images/icons/icons8_Rewind_25px.png"></button>
                            
                            <button class="controlButton play" title="Play" alt="Play"><img src="assets/images/icons/icons8_Circled_Play_50px.png"></button>
                            
                            <button class="controlButton pause" title="Pause" alt="Pause" style="display:none"><img src="assets/images/icons/icons8_Pause_Button_25px_1.png"></button>
                            
                            <button class="controlButton forward" title="Forward" alt="Forward"><img src="assets/images/icons/icons8_Fast_Forward_25px.png"></button>
                            
                            <button class="controlButton loop" title="Replay" alt="Replay"><img src="assets/images/icons/icons8_Repeat_25px.png"></button>
                            
                        </div>
                        <div class="playbackBar">
                            <span class = "progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBackground">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class = "progressTime remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div class="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="volume">
                            <img src="assets/images/icons/icons8_Speaker_25px.png" title="volume" alt="volume">
                            <img src="assets/images/icons/icons8_No_Audio_25px.png" title="mute" alt="mute" style="display:none">
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBackground">
                                <div class="progress"></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>