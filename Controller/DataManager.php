<?php
require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\model/Student.php');
require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\model/Teacher.php');
require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\config.php');
require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\dbhelp.php');
session_start();
class DataManager{
    public $conn;
    public function __construct()
    {
        $this->ConnectDb();
    }

    public function ConnectDb(){
        $this->conn=new mysqli("localhost","root","","db_studentmanagement");
        if (!$this->conn){
            echo ("Connection failed <br>".mysqli_connect_error());
        }
        else
        {
        }
    }

    public function LogOut(){
        session_unset();
    }

    public function NewTeacher(Teacher $newUser){
        // $GenerateUID='select count(*) from user';
        // $result=mysqli_query($this->conn,$GenerateUID);
        // $rowRes=mysqli_fetch_row($result);
        // $userID=$rowRes[0]+1;
        // $Query='INSERT INTO user VALUES(
	       //              "'.$newUser->userName.'","'.$userID.'","'.$newUser->password.'","'.$newUser->email.'",'.$newUser->balance.',"'.$newUser->userRole.'"
        //             )';
            $Query='INSERT INTO `users`(`id`, `username`, `password`, `name`, `position`, `email`, `phone`) VALUES (,"'.$newUser->username.'","'.$newUser->password.'","'.$newUser->name.'","Teacher","'.$newUser->email.'","'.$newUser->phone.'")';
        $result=mysqli_query($this->conn,$Query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function NewStudent(Student $newUser){
            $Query='INSERT INTO `users`(`id`, `username`, `password`, `name`, `position`, `email`, `phone`) VALUES (,"'.$newUser->username.'","'.$newUser->password.'","'.$newUser->name.'","Student","'.$newUser->email.'","'.$newUser->phone.'")';
        $result=mysqli_query($this->conn,$Query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }


    public function GetAllUsers(){
        $Query='select * from users';
        $result=mysqli_fetch_array(mysqli_query($this->conn,$Query));
        return $result;
    }

    public function GetMessage($id1, $id2){
        $Query='select * from messages where (user_send_id = "'.$id1.'" AND user_receiver_id = "'.$id2.'") OR (user_send_id = "'.$id2.'" AND user_receiver_id = "'.$id1.'") ';
        $result=mysqli_fetch_array(mysqli_query($this->conn,$Query));
        return $result;
    }
}
?>