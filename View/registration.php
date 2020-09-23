<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký - Sharescript.net</title>
<link rel="stylesheet" href="main.css" />
<style>
  body {font-family:Arial, Sans-Serif;}
  .clearfix:before, .clearfix:after { content: ""; display: table; }
  .clearfix:after { clear: both; }
  a {color:#0067ab; text-decoration:none;}
  a:hover {text-decoration:underline;}
  .form{width: 300px; margin: 0 auto;}
  input[type='text'], input[type='email'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
  input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}
  input[type='submit']:hover {background-color: #024978;}
</style>
</head>
<body>
<?php
    // require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\config.php');
    $conn = mysqli_connect('localhost', 'root', '', 'db_studentmanagement');
    require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\dbhelp.php');
    if (isset($_REQUEST['username'])){

    // check if username is already in database
    $username = $_REQUEST['username'];
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $res_u = mysqli_query($conn, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
      echo "<div class='form'><h3>Username đã tồn tại, vui lòng nhập lại.</h3><br/>Click để <a href='registration.php'>Quay lại</a></div>";
    }

    else{
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($conn,$username);
      $name = stripslashes($_REQUEST['name']);
      $name = mysqli_real_escape_string($conn,$name);
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($conn,$email);
      $phone = stripslashes($_REQUEST['phone']);
      $phone = mysqli_real_escape_string($conn,$phone);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn,$password);
      $position = stripslashes($_REQUEST['position']);
      $position = mysqli_real_escape_string($conn,$position);


      $query = "INSERT into `users` (username, password, email, name, phone, position) VALUES ('$username', '".md5($password)."', '$email', '$name', '$phone', '$position')";
      $result = mysqli_query($conn,$query);
      if($result){
           echo "<div class='form'><h3>Bạn đã đăng ký thành công</h3><br/>Click để <a href='login.php'>Đăng nhập</a></div>";
      }
    }

    }else{
      ?>
      <div class="form">
      <h1>Đăng ký</h1>
      <form name="registration" action="" method="post">
      <input type="text" name="username" placeholder="Tên đăng nhập" required />
      <input type="text" name="name" placeholder="Họ và tên" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="text" name="phone" placeholder="Số điện thoại" required />
      <input type="password" name="password" placeholder="Mật khẩu" required />
      <p> <label for="position">Chức vụ:</label>
      <select name="position" id="position">
        <option value="Student" style="font-size: 14px">Student</option>
        <option value="Teacher" style="font-size: 14px">Teacher</option>
      </select> </p>
      <input type="submit" name="submit" value="Đăng ký" />
      </form>
      </div>
      <?php } 
?>
</body>
</html>