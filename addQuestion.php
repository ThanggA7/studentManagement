<!DOCTYPE html>
<html lang="vi">
<head>
    <?php require('teacherHeaderLayout.php'); ?>
    <link rel="stylesheet" href="Css/footer.css">
    <meta charset="utf-8">
    <title>Trang đăng bài tập</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <br><input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0) {
        echo "Upload không thành công <br/>";
        echo '<a style="font-size:30;" href="./addQuestion.php">Đăng lại</a><br/>';
        echo '<a style="font-size:30;" href="./listQuestions.php">Xem bài tập ngay!</a>';
    } else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'Questions/' . $_FILES['fileUpload']['name']);
        echo "Upload thành công <br/>";
        echo '<a style="font-size:30;" href="./listQuestions.php?position=Teacher">Xem bài tập ngay!</a>';
    }
}
?>
</body>
</html>