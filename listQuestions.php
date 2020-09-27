<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bài tập</title>
    <meta charset="UTF-8">
	<style>
	.button-submit{
		color: #fff;
		background-color: #28a745;
		border-color: #28a745;
	}
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
        margin: 0;
    }
	</style>
</head>
<body>
	<div class="container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width=1150>Danh sách bài tập</th>
				<?php if ($_GET['position'] == "Student"){
					echo "<th width=1150>Nộp bài</th>";
				} ?>
			</tr>
		</thead>
		<tbody>
	</div>
<?php 
require('dbhelp.php');

//hien thi danh sach bai tap
$dir = "./Questions/";

$allFiles = scandir($dir);
$files = array_diff($allFiles, array('.', '..')); 

if ($_GET['position'] == "Student") {
	require('studentHeaderLayout.php');
	$id = $_SESSION['userID']; //id cua sinh vien
	echo "<br>";
	foreach($files as $file){
		echo "<tr><th><a href='downloadFile.php?file=".$file."'>".$file."</a></th>"
		 .'<th><button class="button-submit" onclick=\'window.open("addAnswer.php?id='.$id.'","_self")\'>Nộp bài</button></th>
		 </tr>';			
	}
}
else {
	require('teacherHeaderLayout.php');
	foreach($files as $file){
		echo "<tr><td><a href='downloadFile.php?file=".$file."'>".$file."</a></td>
		</tr>";
	}
	echo '<br/><button class="button-submit" onclick=\'window.open("listAnswers.php")\'>Xem bài làm của sinh viên</button><br><br>';
}
?>
		</tbody>
	</table>
</body>
</html>