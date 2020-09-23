<!DOCTYPE html>
<html>
<head>
 <title>Teacher Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
  session_start();
  $id = $_SESSION['userID'];
  // echo $id;
  echo '<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="teacherView.php">VCS Student Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="editTeacher.php?id='.$id.'">Sửa thông tin</a></li>
        <li><a href="addStudent.php">Thêm sinh viên</a></li>
        <li><a href="viewAllUsers.php">Xem danh sách người dùng</a></li>
        <li><a href="#">Xem danh sách bài tập</a></li>
        <li><a href="#">Hộp thư</a></li>
        <li><a href="login.php">Đăng xuất</a></li>
      </ul>
    </div>
  </nav>';
?> 
</body>
</html>
<?php
require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\LayoutFooter.php');
?>
