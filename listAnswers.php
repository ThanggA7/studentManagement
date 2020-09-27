<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="stylesheet" href="Css/footer.css">
    <meta charset="UTF-8">
    <title>List Student's answers</title>
<style>
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        text-align: center;
    }
    *{
        box-sizing: border-box;
    }
    body{
        margin-left: 20px;
    }
</style>
<?php require('teacherHeaderLayout.php'); ?>
    <title>Bài làm của sinh viên</title>
    <div>
        <h2 style='margin-left:450px;'>Danh sách bài tập đã nộp</h2>
    </div>

    <!-- jQuery library -->
    <script src="lib/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="lib/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container"> 
<table class="table table-bordered">
    <thead>
    <tr>
        <th width=400 >Người nạp bài</th>
        <th width=300>Tên file</th>
        <th width=300>Thời gian nạp</th>
        <th width=300 >Tải về</th>
    </tr>
    </thead>
    <tbody>

    <?php
    require('dbhelp.php');

    $dir = "./Answers/";

    $allFiles = scandir($dir);
    $files = array_diff($allFiles, array('.', '..'));

    $sql = 'select * from homework';
    $listAnswers = executeResult($sql);

    foreach ($listAnswers as $answer) {
        echo '<tr>
        <td>' . $answer['studentName'] . '</td>
        <td>' . $answer['fileName'] . '</td>
        <td>' . $answer['time'] . '</td>'
        . "<td><a href='downloadFile.php?answer=" . $answer['fileName'] . "'>" . $answer['fileName'] . "</a></td>
          </tr>";
    }
    ?>
    </tbody>
</table>
<div>
</body>
</html>