<center>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<style type="text/css">
	table{
		text-align: center;
	}
</style>
	
<?php
	$user = $_COOKIE['uname'];
	$type = $_COOKIE['type'];
?>
<?php
	if (isset($_POST['submit'])) {

	require 'dbcon.php';
	date_default_timezone_set("asia/manila");

	$sql0 = "select * from tbl_user_accounts where Acc_Uname = '$user'";
	$res = $conn->query($sql0);
	while ($row0 = $res->fetch_assoc()) {
		$fname = $row0['Acc_Fname'];
		$lname = $row0['Acc_Lname'];
}

		$curdate = date("Y-m-d");
		$room = $_POST['room'];

		$sql1 = "select * from tbl_attendance_logs where (Att_Timein <= now() and Att_Timeout >= now() and Att_Date = '$curdate') and Att_Room = '$room'";

		$res1 = $conn->query($sql1);

		if ($res1->num_rows == 0) {
			echo "<h2>This Classroom is Available Right Now!</h2>";
		}elseif ($res1->num_rows >= 1) {

	echo "<table width='100%' class=\"table table-condensed\" cellpadding = '5px' cellspacing = '5px' align = 'center'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Student ID</th>";
	echo "<th>Full Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Year Level</th>";
	echo "<th>Subject</th>";
	echo "<th>Date</th>";
	echo "</tr>";

while ($row1 = $res1->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".$row1['Att_Uname']."</td>";
		echo "<td>".$row1['Att_Fname']." ".$row1['Att_Mname']." ".$row1['Att_Lname']." ".$row1['Att_NameExt']."</td>";
		echo "<td>".$row1['Att_Gender']."</td>";
		echo "<td>".$row1['Att_Ylevel']."</td>";
		echo "<td>".$row1['Att_Subj']."</td>";
		echo "<td>".date("F-d-Y",strtotime($row1['Att_Date']))."</td>";	
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '10' align = 'center'></td>";
		echo "</tr>";
}
	echo "</table>";
	echo "<div align='right'>";
	echo "<a href=\"print_room.php?room=$room&type=$type&fn=$fname&ln=$lname\"><input type='button' class = 'lbutton' style='width:100px;' value='Print All'></a>";
	echo "</div>";
			}
		}
	?>
</center>
