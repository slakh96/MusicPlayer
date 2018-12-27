
<!DOCTYPE html>

<?php
    include("includes/classes/Account.php");
    $account = new Account();
    include("includes/handlers/registerHandler.php");
    include("includes/handlers/loginHandler.php");

?>
<html>
    <head>
        <title>
            Register: Slotify
        </title>
    </head>
    <body>
        <div id="inputContainer">
            <form id= "loginForm" action="register.php" method="post">
                <h2>Login to your account</h2>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required><br>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required><br>
                <button type="submit" name="loginButton">Log in</button>
            </form>
            <h2>Or...</h2>
             <form id= "registerForm" action="register.php" method="post">
                <h2>Create your account</h2>
                <label for="registerUsername">Username</label>
                <input id="registerUsername" name="registerUsername" type="text" placeholder="Username" required><br>
                <label for="registerPassword">Choose Password</label>
                <input id="registerPassword" name="registerPassword" type="password" placeholder="Password" required><br>
                <label for="confirmPassword">Confirm Password</label>
                <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password" required><br>
                <button type="submit" name="registerButton">Register</button>
                 <?php
                    echo $account->checkForError("Username must be at most 25 chars! Passwords must be at least 7 chars and match!");
                 ?>
            </form>
        </div>
    </body>
</html>