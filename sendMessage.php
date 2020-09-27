<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
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
if (isset($_POST['submit'])) {
    $message = stripslashes($_POST['message']);
    $message = mysqli_real_escape_string($conn, $message);
    $idReceive = stripslashes($_GET['id']);
    $idReceive = mysqli_real_escape_string($conn, $idReceive);
    $receiver = stripslashes($_GET['usr']);
    $receiver = mysqli_real_escape_string($conn, $receiver);
    $position = $_GET['position'];
    $idSend = $_SESSION['userID'];
    $sender = $_SESSION['username'];

    // echo $message . $idReceive. $receiver. $position. $idSend. $sender; fix bug
    $sql = "INSERT INTO `messages` (`userSendID`, `userReceiveID`, `sender` , `receiver`, `message`) VALUES ('$idSend','$idReceive', '$sender', '$receiver', '$message')";
    execute($sql);

    echo "<div class='form'><h3>Bạn đã gửi tin nhắn thành công</h3><br/>Click để <a href='listMessageSend.php?id=$idSend&usr=$sender&position=$position'>xem tin nhắn đã gửi</a> Hoặc  <a href='viewAllUsers.php'>quay lại</a> </div>";
} else {
    ?>
    <h1>Send message</h1>
    <form action="" name="sendMessage" method="post">
        <input type="text" name="message" placeholder="Text here" required> <br>
        <input type="submit" name="submit" value="send">
    </form>
    <br>
<?php } ?>
</body>
</html>
