
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
</head>
<body>
<div align="center" style="text-align: center;">
	<form method="POST" autocomplete="off">
	<input type="text" name="room" class="lfield" placeholder="Room Name" required="">
	<input type="submit" name="sub" class="lbutton" value="Add This Room"><br><br>
	<?php
	require 'dbcon.php';
	if (isset($_POST['sub'])) {
	$room = $_POST['room'];
	$sql = "insert into tbl_classrooms (Room_code) values ('$room')";
	if ($conn->query($sql)) {
		echo "Successfully Created!";
	}else{
		echo "Error!";
	}
	}
	?>
</form>
<h2>List of Classrooms</h2>
<?php
$sql1 = "select * from tbl_classrooms";
$result = $conn->query($sql1);
echo "<table width='40%' border = 0 align = 'center' cellspacing='10px' style='text-align: center;'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Room Code</th>";
	echo "<th>Action</th>";
	echo "</tr>";
while ($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$row['Room_code']."</td>";
	echo "<td><a href=\"roomedit.php?room=$row[Room_code]\">rename</a></td>";	
	echo "</tr>";
}
echo "</table>";
?>
</div>
</body>
</html>