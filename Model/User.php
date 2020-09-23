<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';

class Student{
	private $userID;
    private $userName;
	private $password;
    private $position;
	private $email;
	private $phone;

    public function __construct() { }

    public function __construct($userName,$password)
    {
        $this->userName=$userName;
        $this->password=$password;
    }

	// public function __construct($userName,$password,$position,$email,$phone)
 //    {
 //        $this->userID=$userID;
 //        $this->userName=$userName;
 //        $this->password=$password;
 //        $this->position=$position;
 //        $this->email=$email;
 //        $this->phone=$phone;
 //    }
    
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }
     
    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
     
    public function getUserName()
    {
        return $this->userName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
     
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPosition($position)
    {
        $this->position = $position;
    }
     
    public function getPosition()
    {
        return $this->position;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
     
    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
     
    public function getPhone()
    {
        return $this->phone;
    }
}
?>