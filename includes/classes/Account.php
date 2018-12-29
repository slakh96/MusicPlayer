<?php
class Account {
    
    private $con;
    private $errorArray;
    private $activated;
    
    public function __construct($con){//connection variable passed in
        $this->errorArray = array();
        $this->activated = false;
        $this->con = $con;
    }
    public function register($username, $password, $confirmPassword){
        if(in_array(Constants::$signupError, $this->errorArray)){
            $pos = array_search(Constants::$signupError, $this->errorArray);
            unset($this->errorArray[$pos]);
        }
        if(in_array(Constants::$usernameExistsError, $this->errorArray)){
            $pos = array_search(Constants::$usernameExistsError, $this->errorArray);
            unset($this->errorArray[$pos]);
        }
        if($this->validatePasswords($password, $confirmPassword) and $this->validateUsername($username)){
            echo "Good!";
            $this->activated = true;
            return $this->insertUserDetails($username, $password);
        }
        else{
            array_push($this->errorArray, Constants::$signupError);//double colon for statics, since referring to class name
            return false;
        }
    }
    public function checkForError($error){
        if(!in_array($error, $this->errorArray)){
            echo "If statement, no error";
            $error = "";
        }
        return "<span style='color: red' class='errorMessage'>$error</span>";
    }
    private function insertUserDetails($un, $pw){
        $encryptedPw = md5($pw); //gives encrypted version of password
        $profilePic = "assets/images/profile-pics/generic-man-profile.jpg";
        $date = date("Y-m-d");
        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$encryptedPw', '$date', '$profilePic')");
        return $result;//returns true or false depending if successful
        
    }
    
    private function validatePasswords($p1, $p2){
        return $p1 == $p2 and strlen($p1) > 7;
    }
    private function validateUsername($u){
        if (strlen($u) <= 0 || strlen($u) >= 26){
            return false;
        }
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$u'");//finds if matching usernames
        if(mysqli_num_rows($checkUsernameQuery) != 0){
            array_push($this->errorArray, Constants::$usernameExistsError);
            return false;
        }
        return true;
    }
    
}
?>