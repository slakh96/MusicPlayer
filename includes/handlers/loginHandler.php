   <?php
   if(isset($_POST['loginButton'])){
        //echo "login button pressed!";
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
       //Account login function
       $result = $account->login($username, $password);
       if($result){
           header("Location: index.php");
       }
    }
    ?>