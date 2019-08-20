<?php
$s = $_GET['sid'];
$hati = $_GET['hati'];
$type = $_GET['type'];
$fname = $_GET['fn'];
$lname = $_GET['ln'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

<script type="text/javascript">

	window.print();

</script>

<div id="header"  style="background-color: white;"><hr>
<img id="logo1" src="images/ne.png" width="110px" height="110px" style="margin-right: -80px; margin-top: -5px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br><br><hr>
	<h2><b>STUDENT AND CLASSROOM MONITORING SYSTEM</b></h2>
	<img id="logo2" src="images/neust.png" width="115px" height="115px" style="margin-top: -188px;" align="right">
<hr></div>
<div style="text-align: center">

<h2><?php echo $s; ?> - Attendance History</h2>
	<?php
require 'dbcon.php';
date_default_timezone_set("asia/manila");

if ($hati == "Today") {
$sql = "select * from tbl_attendance_logs where Att_Uname = '$s' and Att_Date = curdate() order by Att_Timein DESC,Att_Date DESC";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo "<center>0 Results.</center>";
}else{
	echo "<table width='100%' cellpadding = '5px' cellspacing = '5px' align = 'center'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Student ID</th>";
	echo "<th>Full Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Year Level</th>";
	echo "<th>Subject</th>";
	echo "<th>Room</th>";
	echo "<th>Time In</th>";
	echo "<th>Time Out</th>";
	echo "<th>Date</th>";
	echo "</tr>";

while ($row = $result->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".$row['Att_Uname']."</td>";
		echo "<td>".$row['Att_Fname']." ".$row['Att_Mname']." ".$row['Att_Lname']." ".$row['Att_NameExt']."</td>";
		echo "<td>".$row['Att_Gender']."</td>";
		echo "<td>".$row['Att_Ylevel']."</td>";
		echo "<td>".$row['Att_Subj']."</td>";
		echo "<td>".$row['Att_Room']."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timein']))."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timeout']))."</td>";
		echo "<td>".$row['Att_Date']."</td>";	
		echo "</tr>";
}
	echo "</table><br><br>";
	echo "<div align = 'right'>";
	echo "Printed By:<br>";
	echo "<u>".$fname." ".$lname."</u><br>";
	echo "<b>".$type."</b>";
	echo "</div>";
}
}elseif ($hati == "Weekly") {
$sql = "select * from tbl_attendance_logs where Att_Uname = '$s' and Att_Date >= date_sub(curdate(),interval 7 day) order by Att_Timein DESC,Att_Date DESC";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo "<center>0 Results.</center>";
}else{
	echo "<table width='100%' cellpadding = '5px' cellspacing = '5px' align = 'center'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Student ID</th>";
	echo "<th>Full Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Year Level</th>";
	echo "<th>Subject</th>";
	echo "<th>Room</th>";
	echo "<th>Time In</th>";
	echo "<th>Time Out</th>";
	echo "<th>Date</th>";
	echo "</tr>";

while ($row = $result->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".$row['Att_Uname']."</td>";
		echo "<td>".$row['Att_Fname']." ".$row['Att_Mname']." ".$row['Att_Lname']." ".$row['Att_NameExt']."</td>";
		echo "<td>".$row['Att_Gender']."</td>";
		echo "<td>".$row['Att_Ylevel']."</td>";
		echo "<td>".$row['Att_Subj']."</td>";
		echo "<td>".$row['Att_Room']."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timein']))."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timeout']))."</td>";
		echo "<td>".$row['Att_Date']."</td>";	
		echo "</tr>";
}
	echo "</table><br><br>";
	echo "<div align = 'right'>";
	echo "Printed By:<br>";
	echo "<u>".$fname." ".$lname."</u><br>";
	echo "<b>".$type."</b>";
	echo "</div>";
}
}elseif ($hati == "Monthly") {
	$curmonth = date("m");
$sql = "select * from tbl_attendance_logs where Att_Uname = '$s' and month(Att_Date) = '$curmonth' order by Att_Timein DESC,Att_Date DESC";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo "<center>0 Results.</center>";
}else{
	echo "<table width='100%' cellpadding = '5px' cellspacing = '5px' align = 'center'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Student ID</th>";
	echo "<th>Full Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Year Level</th>";
	echo "<th>Subject</th>";
	echo "<th>Room</th>";
	echo "<th>Time In</th>";
	echo "<th>Time Out</th>";
	echo "<th>Date</th>";
	echo "</tr>";

while ($row = $result->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".$row['Att_Uname']."</td>";
		echo "<td>".$row['Att_Fname']." ".$row['Att_Mname']." ".$row['Att_Lname']." ".$row['Att_NameExt']."</td>";
		echo "<td>".$row['Att_Gender']."</td>";
		echo "<td>".$row['Att_Ylevel']."</td>";
		echo "<td>".$row['Att_Subj']."</td>";
		echo "<td>".$row['Att_Room']."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timein']))."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timeout']))."</td>";
		echo "<td>".$row['Att_Date']."</td>";	
		echo "</tr>";
}
	echo "</table><br><br>";
	echo "<div align = 'right'>";
	echo "Printed By:<br>";
	echo "<u>".$fname." ".$lname."</u><br>";
	echo "<b>".$type."</b>";
	echo "</div>";
}	
}
?>
</div>
<script type="text/javascript">
	window.location.assign("print_success.php");
</script>
</body>
</html>