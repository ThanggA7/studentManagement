<?php
require('dbhelp.php');
require('teacherHeaderLayout.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="Css/main.css"/>
    <link rel="stylesheet" href="Css/footer.css">
</head>
<body>
<?php
if (isset($_REQUEST['username'])) {

    // check if username is already in database
    $username = $_REQUEST['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $res_u = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res_u) > 0) {
        echo "<div class='form'><h3>Username đã tồn tại, vui lòng nhập lại.</h3><br/>Click để <a href='addStudent.php'>Quay lại</a></div>";
    } else {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn, $name);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($conn, $phone);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "INSERT into `users` (username, password, email, name, phone, position) VALUES ('$username', '" . md5($password) . "', '$email', '$name', '$phone', 'Student')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'><h3>Bạn đã thêm sinh viên thành công</h3><br/>Click để <a href='TeacherView.php'>Quay lại</a></div>";
        }
    }
} else {
    ?>
    <div class="form">
        <h1>Thêm Sinh Viên</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Tên đăng nhập" required/>
            <input type="text" name="name" placeholder="Họ và tên" required/>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="text" name="phone" placeholder="Số điện thoại" required/>
            <input type="password" name="password" placeholder="Mật khẩu" required/> <br>
            <input type="submit" style="background-color:#28a745" name="submit" value="Thêm"/>
        </form>
    </div>
<?php }
?>
</body>
</html>