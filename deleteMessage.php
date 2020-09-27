<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    require('dbhelp.php');
    $sql = 'delete from messages where id = ' . $id;
    execute($sql);

    echo 'Xoá tin nhắn thành công';
}

