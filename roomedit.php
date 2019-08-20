<?php
require 'dbcon2.php';

if(isset($_POST['update']))
{	
	$rname = mysqli_real_escape_string($mysqli, $_POST['rname']);
	$room = mysqli_real_escape_string($mysqli, $_POST['room']);	

	
		$sql = "UPDATE tbl_classrooms SET Room_code = '$rname' WHERE Room_code = '$room'";
		if (mysqli_query($mysqli,$sql)) {
			header("location:add_classroom.php");
		}
		
}
?>
<?php
$room = $_GET['room'];

$sql2 = "SELECT Room_code FROM tbl_classrooms WHERE Room_code = '$room'";
$result = mysqli_query($mysqli,$sql2);

$res = mysqli_fetch_array($result);
	$croom = $res['Room_code'];
?>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
	<h3 align="center">Rename Classroom</h3>
	<br/>
	
	<form name="form1" method="POST" action="roomedit.php" autocomplete="off">
		<table border="0" align="center">
			<tr> 
				<td>Room Name: </td>
				<td><input type="text" class="lfield" name="rname" value="<?php echo $croom;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
			<td><input type="hidden" name="room" value=<?php echo $_GET['room'];?>></td>
				<td colspan="1"><input class="lbutton" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
