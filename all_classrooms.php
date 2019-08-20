<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
<div align="center" style="text-align: center;">
	<form method="POST" action="cr_select.php" target="view_classroom">
	<h2>Check Classroom:</h2>
	<select name="room" class="lfield">
		<?php
		require 'dbcon.php';
		$sql = "select Room_Code from tbl_classrooms";
		$res = $conn->query($sql);
		while ($row = $res->fetch_assoc()) {
			echo "<option>".$row['Room_Code']."</option>";
		}
		?>
	</select><br><br>
	<input type="submit" name="submit" value="Procceed" class="lbutton"><br>
</form>
<br>
<div>
	<iframe src="#" name="view_classroom" width="100%" height="200px" style="border: none;"></iframe>
</div>
</div>
</body>
</html>