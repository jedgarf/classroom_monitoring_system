<?php
	setcookie(type,"", time() + 3600, "/");
	setcookie(uname,"", time() + 3600, "/");
	header("location:index.php");
?>