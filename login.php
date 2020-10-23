<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<!-- <link rel="stylesheet" href="main.css" /> -->
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
session_start();
require('dbhelp.php');
require 'vendor/autoload.php';
use Twilio\Rest\Client;
$sid = "ACebffded77cf4bc0c0f64057c6f0b6341";
$token = "75e7d9628796438b93018c964af4cf87";
if (isset($_POST['submit'])){   
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $temp=mysqli_fetch_array($result);
    $rows = mysqli_num_rows($result);
    // echo $temp['position'];
    if($rows==1){
      $_SESSION['username'] = $username;
      $_SESSION['position'] = $temp['position'];
      $_SESSION['userID'] = $temp['id'];
      $phone = $temp['phone'];
      // echo $phone;
      //send pin.
      $pin = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
      $sql = "UPDATE users SET pin = '$pin'  WHERE id = '" . $temp['id'] . "'";
      mysqli_query($conn, $sql);
      $client = new Client($sid, $token);
      $client->messages->create(
          $phone, array(
              "from" => "+13132635133",
              "body" => "Your verified code is: ". $pin
          )
      );
      header("Location: verified.php");
    }
    else{
      echo "<div class='form'><h3>Tên đăng nhập hoặc mật khẩu không đúng!</h3></br><a href='login.php'>Đăng nhập lại</a></div>";
    }
  }
elseif(isset($_POST['fbsubmit'])){
  require_once( 'Facebook/autoload.php' );
  $fb = new Facebook\Facebook([
    'app_id' => '397768601400691',
    'app_secret' => '75b9049c28a5c3704436267dba13477b',
    'default_graph_version' => 'v8.0',
    ]);
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('http://site.test/studentManagement6a/fbcallback.php', $permissions);
  header("Location: $loginUrl");
}
else{
?>
<div class="form">
<h1>Đăng nhập</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Tên đăng nhập" />
<input type="password" name="password" placeholder="Mật khẩu" />
<input name="submit" type="submit" value="Đăng nhập" />
<input name="fbsubmit" type="submit" value="Login with facebook" />
<!-- <a href="' . $loginUrl . '">Log in with Facebook!</a> -->
</form>
<!-- <p>Bạn chưa có tài khoản? <a href='registration.php'>Đăng ký ngay</a></p><br/> -->
</div>
<?php } ?>
</body>
</html>