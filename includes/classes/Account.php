<?php
class Account {
    
    private $errorArray;
    private $activated;
    
    public function __construct(){
        $this->errorArray = array();
        $this->activated = false;
    }
    public function register($username, $password, $confirmPassword){
        if($this->validatePasswords($password, $confirmPassword) and $this->validateUsername($username)){
            echo "Good!";
            $this->activated = true;
            return true;
        }
        else{
            echo "Registration not completed...error";
            array_push($this->errorArray, "Username must be at most 25 chars! Passwords must be at least 7 chars and match!");
            return false;
        }
    }
    public function checkForError($error){
        if(!in_array($error, $this->errorArray)){
            echo "If statement, no error";
            $error = "";
        }
        echo "Error exists";
        return "<span class='errorMessage'>$error</span>";
    }
    private function validatePasswords($p1, $p2){
        return $p1 == $p2 and strlen($p1) > 7;
    }
    private function validateUsername($u){
        return strlen($u) > 0 and strlen($u) < 26;
        //TODO: Check if username exists already!
    }
    
}
?>