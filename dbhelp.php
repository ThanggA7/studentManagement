<?php
//create connection toi database
$conn = mysqli_connect('localhost', 'root', '', 'db_studentmanagement6a');
if (mysqli_connect_errno()) {
    die("MySQL connection failed: " . mysqli_connect_error());
}

/**
 * insert, update, delete -> su dung function
 */
function execute($sql)
{
    //create connection toi database
    $conn = mysqli_connect('localhost', 'root', '', 'db_studentmanagement6a');

    //query
    mysqli_query($conn, $sql);

    //dong connection
    mysqli_close($conn);
}


//  su dung cho lenh select => tra ve 1 mảng các đối tượng
function executeResult($sql)
{

    //create connection toi database
    $conn = mysqli_connect('localhost', 'root', '', 'db_studentmanagement6a');

    //query
    $resultset = mysqli_query($conn, $sql);
    $list = [];
    while ($row = mysqli_fetch_array($resultset, 1)) {
        $list[] = $row;
    }

    //dong connection
    mysqli_close($conn);

    return $list;
}