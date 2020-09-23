<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require($_SERVER["DOCUMENT_ROOT"].'\studentManagement\dbhelp.php');
	$sql = 'delete from users where id = '.$id;
	execute($sql);

	echo 'Xoá sinh viên thành công';
}