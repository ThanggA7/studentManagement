<?php
require('dbhelp.php');
if($_GET['position']=="Student"){
    require('studentHeaderLayout.php');
}
else{
    require('teacherHeaderLayout.php');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title> User List </title>
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
        <div class="panel-heading"><br>
            Danh sách người dùng
            <form method="post">
                <input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;"
                       placeholder="Tìm kiếm theo tên">
            </form>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Họ & tên</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Vị trí</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_POST['s']) && $_POST['s'] != '') {
                    $sql = 'select * from users where name like "%' . $_POST['s'] . '%" ';
                } else {
                    $sql = 'select * from users';
                }
                $userList = executeResult($sql);

                $index = 1;
                foreach ($userList as $usr) {
                    echo '<tr>
                    <td>' . ($index++) . '</td>
                    <td>' . $usr['name'] . '</td>
                    <td>' . $usr['username'] . '</td>
                    <td>' . $usr['email'] . '</td>
                    <td>' . $usr['phone'] . '</td>
                    <td>' . $usr['position'] . '</td>';
                    echo '<td><button class="button btn-primary" onclick=\'window.open("sendMessage.php?id=' . $usr['id'] . '&usr=' . $usr['username'] . '&position=' . $_SESSION['position'] . '","_self")\'>Message</button></td>';
                    if ($_SESSION['position'] == 'Teacher' && $_SESSION['position'] != $usr['position']) {
                        echo '<td><button class="btn btn-warning" onclick=\'window.open("editStudent.php?id=' . $usr['id'] . '&position=' . $_GET['position'] . '","_self")\'>Edit</button></td>
       	                <td><button class="btn btn-danger" onclick="deleteStudent(' . $usr['id'] . ')">Delete</button></td>';
                    }
                    echo '</tr>';
                }

                ?>
                </tbody>
            </table>
            <?php
            if ($_SESSION['position'] == "Teacher") {
                echo '<button class="btn btn-success" onclick=\'window.open("addStudent.php")\'>Add Student</button> ';
            }
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteStudent(id) {
        option = confirm('Bạn có muốn xóa sinh viên này không?')
        if (!option) {
            return;
        }
        console.log(id)
        $.post('deleteStudent.php', {'id': id}, function (data) {
            alert(data)
            location.reload()
        })
    }
</script>
</body>
</html>

