<?php
// define('HOST', 'localhost');
// define('DATABASE', 'db_studentmanagement');
// define('USERNAME', 'root');
// define('PASSWORD', '');
$conn = mysqli_connect('localhost', 'root', '', 'db_studentmanagement');
if (mysqli_connect_errno())
  {
  echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
  }
?>

