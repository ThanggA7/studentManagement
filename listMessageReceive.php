<!DOCTYPE html>
<?php
    if($_GET['position']=="Teacher"){
        require('teacherHeaderLayout.php');
    }
    else{
        require('studentHeaderLayout.php');
    }
      require('dbhelp.php');
    ?>
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
    }
    *{
        box-sizing: border-box;
    }
    body{
        margin: 0;
    }
</style>
<html lang="vi">
<head>

    <title>Chat Sended</title>
    <link rel="stylesheet" href="Css/footer.css">
    <meta charset="UTF-8">
    <div>
        <h1 style="text-align: center;">Tin nhắn đã nhận</h1> <br><br><br>
    </div>
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
<table class="table table-bordered">
    <thead>
    <tr>
        <th width=200>Người gửi</th>
        <th width=200>Người nhận</th>
        <th width=400>Nội dung</th>
        <th width=300>Thời gian</th>
        <th width=200>Action</th>
        <th width=200>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_GET['id'])) {

    $receiverID = $_GET['id']; //id nguoi nhan.

    //lay toan bo tin nhan
    $sql = "select * from messages where userReceiveID = '$receiverID' ";

    $listMessage = executeResult($sql);

    foreach ($listMessage as $msg) { ?>
        <tr>
			<td> <?php echo $msg['sender'] ?></td>
			<td> <?php echo $msg['receiver'] ?> </td>
			<td> <?php echo $msg['message'] ?> </td>
			<td> <?php echo $msg['createdTime'] ?></td>
            <td><button class="btn btn-warning" onclick="window.open('sendMessage.php?id=<?php echo $msg['userSendID'] ?>&usr=<?php echo $msg['sender'] ?>&position=<?php echo $_GET['position'] ?>','_self')">Reply</button></td>
            <td><button class="btn btn-danger" onclick="deleteMessage(<?php echo $msg['id'] ?>)">Delete</button></td>
	    </tr>
   <?php } ?>
    </tbody>
</table>
</div>
<script type="text/javascript">
    function deleteMessage(id) {
        option = confirm('Bạn có muốn xóa tin nhắn này không?')
        if (!option) {
            return;
        }
        console.log(id)
        $.post('deleteMessage.php', {'id': id}, function (data) {
            alert(data)
            location.reload()
        })
    }
</script>
</body>
</html>

<?php }
?>
