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
        if($this->validatePasswords($password, $confirmPassword) and $this->validateUsername($username)){
            echo "Good!";
            $this->activated = true;
            return $this->insertUserDetails($username, $password);
        }
        else if(!in_array(Constants::$usernameExistsError, $this->errorArray)){
            array_push($this->errorArray, Constants::$signupError);//double colon for statics, since referring to class name
            return false;
        }
    }
    public function checkForError($error){
        if(!in_array($error, $this->errorArray)){
            //echo "If statement, no error";
            $error = "";
        }
        if(in_array($error, $this->errorArray)){
            $pos = array_search($error, $this->errorArray);
            unset($this->errorArray[$pos]);
        }//removes the error, so doesn't get left over in the error array.
        return "<span style='color: red; font-size:60%;' class='errorMessage'>$error</span>";
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
    public function login($un, $pw){
        $pw = md5($pw);//Encrypt password
        
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password='$pw'");
        if(mysqli_num_rows($query) == 1){
            return true;
        }
        array_push($this->errorArray, Constants::$loginFailedError);
        return false;
    }
    
}
?>