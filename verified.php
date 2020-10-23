<?php
 
session_start();
require('dbhelp.php');
if (isset($_POST["enter_pin"])){
    $pin = $_POST["pin"];
    $user_id = $_SESSION['userID'];

    // echo $user_id;
        
    $sql = "SELECT * FROM users WHERE id = '$user_id' AND pin = '$pin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        $sql = "UPDATE users SET pin = '' WHERE id = '$user_id'";
        mysqli_query($conn, $sql);

        if ($_SESSION['position'] == "Teacher") {
      	header("Location: teacherView.php");
      }
      else if ($_SESSION['position'] == "Student") {
      	header("Location: studentView.php");
      }
      else
      {
        echo "Loi";
      }
    }
    else
    {
        echo "Wrong pin";
    }
}
else{
?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style> 
      .form{
        padding-top: 200px;
        width: 300px; 
        margin: 0 auto;
        }
    </style>
    <div class=form>
      <h3>Nhập mã pin: </h3>
      <form method="POST" action="">
        <input type="text" name="pin">   
        <!-- <input type="submit" name="enter_pin"> -->
        <button class="btn btn-success" name="enter_pin">Xác nhận</button>
      </form>
    </div>
<?php } ?>