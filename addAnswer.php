<!DOCTYPE html>
<html lang="vi">
<head>
    <?php require('studentHeaderLayout.php'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang nạp bài tập</title>
    <link rel="stylesheet" href="Css/footer.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <br><input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php
require('dbhelp.php');

$id = '';
if (isset($_POST['up']) && isset($_FILES['fileUpload']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from users where id = ' . $id; // . = noi chuoi

    $listStudent = executeResult($sql);

    if ($listStudent != null && sizeof($listStudent) > 0) {
        $sv = $listStudent[0];
        $s_username = $sv['username'];
    }

    if ($_FILES['fileUpload']['error'] > 0) {
        echo "Upload không thành công <br/>";
        echo '<a style="font-size:30;" href="./addAnswer.php?id=' . $id . '">Đăng lại</a><br/>';
    } else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], './Answers/' . $_FILES['fileUpload']['name']);
        $s_filename = $_FILES['fileUpload']['name'];
        echo "Upload thành công <br/>";
        $sql = "insert into homework(studentName, fileName) value ('$s_username', '$s_filename')";
        execute($sql);
    }
}
?>
</body>
</html>