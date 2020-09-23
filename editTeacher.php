<?php
require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\dbhelp.php');

$s_name = $s_email = $s_phone = $s_username = $s_password = '';

if (!empty($_POST)) {
  $s_id = '';

  if (isset($_POST['email'])){
    $s_email = $_POST['email'];
  }

  if (isset($_POST['phone'])){
    $s_phone = $_POST['phone'];
  }

  if (isset($_POST['password'])){
    $s_password = $_POST['password'];
  }

  if (isset($_POST['id'])){
    $s_id = $_POST['id'];
  }

  $s_email = str_replace('\'', '\\\'', $s_email);
  $s_phone = str_replace('\'', '\\\'', $s_phone);
  $s_password = str_replace('\'', '\\\'', $s_password);
  $s_id = str_replace('\'', '\\\'', $s_id);

  // Update user
  $sql = "update users set email = '$s_email', phone = '$s_phone', password ='$s_password' where id = ".$s_id;

  execute($sql);

  header('location: viewAllUsers.php');
  die();
}
$id = '';
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = 'select * from users where id = ' .$id;
  $teacherList = executeResult($sql);
  if($teacherList != null && count($teacherList) > 0){
    $std = $teacherList[0];
    $s_name = $std['name'];
    $s_email = $std['email'];
    $s_phone = $std['phone'];
    $s_username = $std['username'];
    $s_password = $std['password'];
  } else{
    $id = '';
  }
} 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Teacher Form</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="text-center">Edit Teacher</h2>
      </div>
      <div class="panel-body">
        <form method="post" >
          <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" value="<?=$s_username?>" disabled>
        </div>
          <div class="form-group">
          <label for="usr">Name:</label>
          <input type="number" name="id" value="<?=$id?>" style="display: none;">
          <input required="true" type="text" class="form-control" id="usr" name="name" value="<?=$s_name?>" disabled>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$s_email?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="phone" class="form-control" id="phone" name="phone" value="<?=$s_phone?>">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input required="true" type="password" class="form-control" id="password" name="password" value="<?=$s_password?>">
        </div>
        <button class="btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>