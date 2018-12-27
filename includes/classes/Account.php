<?php
class Account {
    
    private $errorArray;
    private $activated;
    
    public function __construct(){
        $this->errorArray = array();
        $this->activated = false;
    }
    public function register($username, $password, $confirmPassword){
        if(in_array(Constants::$signupError, $this->errorArray)){
            $pos = array_search(Constants::$signupError, $this->errorArray);
            unset($this->errorArray[$pos]);
        }
        if($this->validatePasswords($password, $confirmPassword) and $this->validateUsername($username)){
            echo "Good!";
            $this->activated = true;
            return true;
        }
        else{
            //echo "Registration not completed...error";
            array_push($this->errorArray, Constants::$signupError);//double colon for statics
            return false;
        }
    }
    public function checkForError($error){
        if(!in_array($error, $this->errorArray)){
            echo "If statement, no error";
            $error = "";
        }
        //echo "Error exists";
        return "<span style='color: red' class='errorMessage'>$error</span>";
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