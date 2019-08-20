<?php
if (isset($_COOKIE['type']) && isset($_COOKIE['uname'])) {
	$user = $_COOKIE['uname'];
	$type = $_COOKIE['type'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
<div style="text-align: center">
	<?php
require 'dbcon.php';

$id = $_GET['s'];
$s = "GC".$id;
$hati = $_GET['hati'];

date_default_timezone_set("asia/manila");

if ($hati == "Today") {

$sql0 = "select * from tbl_user_accounts where Acc_Uname = '$user'";
$res = $conn->query($sql0);
while ($row0 = $res->fetch_assoc()) {
	$fname = $row0['Acc_Fname'];
	$lname = $row0['Acc_Lname'];
}

$sql = "select * from tbl_attendance_logs where Att_Uname = '$s' and Att_Date = curdate() order by Att_Timein DESC,Att_Date DESC";

$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo "<center>0 Results.</center>";
}else{
	echo "<table cellpadding = '5px' cellspacing = '5px' align = 'center'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Student ID</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
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
		echo "<td>".$row['Att_Fname']."</td>";
		echo "<td>".$row['Att_Lname']."</td>";
		echo "<td>".$row['Att_Gender']."</td>";
		echo "<td>".$row['Att_Ylevel']."</td>";
		echo "<td>".$row['Att_Subj']."</td>";
		echo "<td>".$row['Att_Room']."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timein']))."</td>";
		echo "<td>".date('h:i:s', strtotime($row['Att_Timeout']))."</td>";
		echo "<td>".$row['Att_Date']."</td>";	
		echo "</tr>";
}
echo "<tr><td colspan = '10' align = 'center'><a href=\"stud_print.php?sid=$s&hati=$hati&type=$type&fn=$fname&ln=$lname\"><button class = 'lbutton'>Print All</button></a></td>";
		echo "</tr>";
	echo "</table>";
}
}elseif ($hati == "Weekly") {

$sql0 = "select * from tbl_user_accounts where Acc_Uname = '$user'";
$res = $conn->query($sql0);
while ($row0 = $res->fetch_assoc()) {
	$fname = $row0['Acc_Fname'];
	$lname = $row0['Acc_Lname'];
}

$sql = "select * from tbl_attendance_logs where Att_Uname = '$s' and Att_Date >= date_sub(curdate(),interval 7 day) order by Att_Timein DESC,Att_Date DESC";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo "<center>0 Results.</center>";
}else{
	echo "<table width = '100%' cellpadding = '5px' cellspacing = '5px' align = 'center'>";
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
echo "<tr><td colspan = '10' align = 'center'><a href=\"stud_print.php?sid=$s&hati=$hati&type=$type&fn=$fname&ln=$lname\"><button class = 'lbutton'>Print All</button></a></td>";
		echo "</tr>";
	echo "</table>";
}
}elseif ($hati == "Monthly") {

$sql0 = "select * from tbl_user_accounts where Acc_Uname = '$user'";
$res = $conn->query($sql0);
while ($row0 = $res->fetch_assoc()) {
	$fname = $row0['Acc_Fname'];
	$lname = $row0['Acc_Lname'];
}

	$curmonth = date("m");
$sql = "select * from tbl_attendance_logs where Att_Uname = '$s' and month(Att_Date) = '$curmonth' order by Att_Timein DESC,Att_Date DESC";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo "<center>0 Results.</center>";
}else{
	echo "<table cellpadding = '5px' cellspacing = '5px' align = 'center'>";
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
	echo "</table>";
	echo "<a href=\"stud_print.php?sid=$s&hati=$hati&type=$type&fn=$fname&ln=$lname\"><button class = 'lbutton'>Print All</button></a>";
}	
}
?>
</div>
</body>
</html>	