<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Edit Message</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/footer.css">
</head>
<body>
<?php
require('dbhelp.php');
if($_GET['position']=='Student'){
    require('studentHeaderLayout.php');
}
else{
    require('teacherHeaderLayout.php');
}
$s_message="";
if(isset($_GET['id'])){
    $s_id = $_GET['id'];
    $sql = 'select * from messages where id = ' .$s_id;
    $result = executeResult($sql);
    if(count($result)){
        $mess=$result[0];
        $s_message = $mess['message'];
    }
}
if (isset($_POST['submit'])) {
    $s_message = $_POST['message'];
    $id = $_GET['id'];
    $idSend = $_SESSION['userID'];
    $sender = $_SESSION['username'];
    $position = $_GET['position'];

    $sql = "update messages set message = '$s_message' where id = " .$id;
    $result = execute($sql);

    echo "<div class='form'><h3>Bạn đã sửa tin nhắn thành công</h3><br/>Click để <a href='listMessageSend.php?id=$idSend&usr=$sender&position=$position'>xem tin nhắn đã gửi</a></div>";
} else {
    ?>
    <h1>Send message</h1>
    <form action="" name="editMessage" method="post">
        <input type="text" name="message" value="<?php echo $s_message ?>" required> <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <br>
<?php } ?>
</body>
</html>
