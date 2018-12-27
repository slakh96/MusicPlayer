<?php

    function sanitizeFormString($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
    }
    
    function sanitizeFormPassword($inputText){
        $inputText = strip_tags($inputText);
        return $inputText;
    }
    if(isset($_POST['registerButton'])){
        echo "register button pressed!";
        $username = sanitizeFormString($_POST['registerUsername']);
        $password = sanitizeFormPassword($_POST['registerPassword']);
        $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);
        $registered = $account->register($username, $password, $confirmPassword);//account accessible since all this code imports to register.php, where account var is defined
        if($registered){
            header("Location: index.php");
        }
        unset($_POST['registerButton']);
        
    }
?>
