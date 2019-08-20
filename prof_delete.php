<?php
require 'dbcon.php';
$id = $_GET['id'];

$sql = "DELETE FROM tbl_user_accounts WHERE Acc_Uname = '$id'";
	$conn->query($sql);
	header("location:all_professors.php");
?>