
<!DOCTYPE html>

<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    $account = new Account($con); //mysqli_connect("localhost", "root", "", "musicPlayer");
    include("includes/handlers/registerHandler.php");
    include("includes/handlers/loginHandler.php");

    function getInputValue($fieldName){
        if(isset($_POST[$fieldName])){
            echo $_POST[$fieldName];
        }
    }

?>
<html>
    <head>
        <title>
            Register: Slotify
        </title>
        <link rel="stylesheet" type="text/css" href="assets/css/register.css">
        <link rel="stylesheet" type="text/css" href="assets/css/grid.css">
        <!--<link rel="stylesheet" type="text/css" href="assets/css/animate.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/register.js"></script>
    </head>
    <body>
        <?php
            if(isset($_POST['registerButton'])){//checks if the register button was just pressed, if so show the register screen again
                echo "<script>
                    $(document).ready(function(){
                        $('#loginForm').hide();
                        $('#registerForm').show();
                    });
                </script>";
                unset($_POST['registerButton']);
            }
            else{
                echo "<script>
                    $(document).ready(function(){
                        $('#loginForm').show();
                        $('#registerForm').hide();
                    });
                </script>";
            }
        ?>
        <div class="row">
            <div class=" col span-1-of-3">
                <div class="outer">
                <div class="middle"><!----Centering a div vertically---->
                <div id="inputContainer" class="loginContainer">
                    <form id= "loginForm" action="register.php" method="post">
                        <h2>Login to your account</h2>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="Enter username..." value="<?php getInputValue('loginUsername')?>" required><br>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Enter password..." required><br>
                        <button type="submit" name="loginButton">Log in</button>
                        <?php
                            echo $account->checkForError(Constants::$loginFailedError);
                         ?>
                        <div class="ls-toggle">
                            <a id="hide-login" href="#">Don't have an account yet? Click <b>here</b> to sign up, free.</a>
                        </div>
                    </form>

                     <form id= "registerForm" action="register.php" method="post">
                        <h2>Create your account</h2>
                        <label for="registerUsername">Username</label>
                        <input id="registerUsername" name="registerUsername" type="text" placeholder="Choose username" value="<?php getInputValue('registerUsername')?>" required><br>
                        <label for="registerPassword">Choose Password</label>
                        <input id="registerPassword" name="registerPassword" type="password" placeholder="Choose password" required><br>
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password" required><br>
                        <button type="submit" name="registerButton">Register</button>
                         <?php
                            echo $account->checkForError(Constants::$signupError);
                            echo $account->checkForError(Constants::$usernameExistsError);
                         ?>
                         <div class="ls-toggle">
                            <a id="hide-register" href="#">Already have an account? Click <b>here</b> to log in.</a>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
            <div class="col span-2-of-3">
            <div class="adContainer">
            <div class="outer">
            <div class="middle">
                <h1>Find Awesome Music and quality artists.</h1>
                <h2>Listen to nonstop music, completely free.</h2>
                <ul>
                    <li>Discover upcoming artists and stalwarts of yesterday.</li>
                    <li>Create and save your own playlists.</li>
                    <li>Follow artists and other users to keep up to date on the newest music.</li>
                </ul>
            </div>
            </div>
            </div>
            </div>
        </div>
        <footer>
            <a href="https://icons8.com/color-icons">Flat color icons by Icons8</a>
        </footer>
    </body>
</html>