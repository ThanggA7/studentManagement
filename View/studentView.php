<!DOCTYPE html>
<html>
<head>
  <title>Student Home</title>
  
  <!-- Css -->
  <!-- <link rel="stylesheet" href="main.css" /> -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php  
  $id = $_SESSION['userID'];
  // echo $id;
  echo '<div id="studentHome" style="display: block;">
            <p4><button onclick=\'window.open("editStudent.php?id='.$id.'","_self")\'>Sửa thông tin</button></p4>
            <p5><button onclick=\'window.open("viewAllUsers.php","_self")\'" " >Xem danh sách người dùng</button></p5>
            <p6><button name="button" type="button" onclick="openViewScheduleTab()">Xem danh sách bài tập</button></p6>
            <p6><button name="button" type="button" onclick="openScoreboardTab()">Hộp thư</button></p6>
            <p6><button onclick=\'window.open("login.php","_self")\'">Đăng xuất</button></p6>
        </div>';
        ?>
</body>
</html>
