   <?php
   if(isset($_POST['loginButton'])){
        //echo "login button pressed!";
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
       //Account login function
       $result = $account->login($username, $password);
       if($result){
           $_SESSION['userLoggedIn'] = $username;
           header("Location: index.php");
       }
       else{
            unset($_SESSION['userLoggedIn']);//No one is logged in if someone else is trying to login. TODO:Consider changing the behavior of this
       }
    }
    ?>