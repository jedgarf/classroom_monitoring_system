<?php
$type = $_GET['type'];
$room = $_GET['room'];
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

<div id="header" style="background-color: white;"><hr>
<img id="logo1" src="images/ne.png" width="110px" height="110px" style="margin-right: -80px; margin-top: -5px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br><br><hr>
	<h2><b>STUDENT AND CLASSROOM MONITORING SYSTEM</b></h2>
	<img id="logo2" src="images/neust.png" width="115px" height="115px" style="margin-top: -188px;" align="right">
<hr></div>
<div align="center" style="text-align: center;">
	<form method="GET">
	<h2 align="center">List of Student in <?php echo $room; ?></h2>
	<?php
		require 'dbcon.php';
		date_default_timezone_set("asia/manila");

		$curdate = date("Y-m-d");
		$sql1 = "select * from tbl_attendance_logs where (Att_Timein <= now() and Att_Timeout >= now() and Att_Date = '$curdate') and Att_Room = '$room'";
		$res1 = $conn->query($sql1);
		if ($res1->num_rows >= 1) {

	echo "<table width='100%' cellpadding = '5px' cellspacing = '5px' align = 'center'>";
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
		echo "<td>".$row1['Att_Date']."</td>";	
		echo "</tr>";
}
	echo "</table><br><br><br><br>";
	echo "<div align = 'right'>";
	echo "Printed By:<br>";
	echo "<u>".$fname." ".$lname."</u><br>";
	echo "<b>".$type."</b>";
	echo "</div>";
			}
	?>
	<script type="text/javascript">
		window.location.assign("print_success.php");
	</script>
</form>
</div></body>
</html>