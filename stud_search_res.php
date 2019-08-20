<link rel="stylesheet" type="text/css" href="CSS/style.css">
<style type="text/css">
	table{
		text-align: center;
	}
</style>
<?php
	require 'dbcon.php';
if (isset($_POST['sub'])) {
	$id = $_POST['s'];
	$s = "GC".$id;	
$sql = "select * from tbl_1st_year where Acc_Uname = '$s' union all select * from tbl_2nd_year where Acc_Uname = '$s' union all select * from tbl_3rd_year where Acc_Uname = '$s' union all select * from tbl_4th_year where Acc_Uname = '$s'";
$today = date("h:i:s");
$result = $conn->query($sql);

if ($result->num_rows == 0) {

	echo "<center>0 Results.</center>";

}else{

	echo "<table width = '100%' cellpadding = '5px' cellspacing = '5px' align = 'center'>";
	echo "<tr bgcolor='#CCCCCC'>";
	echo "<th>Student ID</th>";
	echo "<th>Full Name</th>";
	echo "<th>Gender</th>";
	echo "<th>Age</th>";
	echo "<th>Birth Date</th>";
	echo "<th>Year Level</th>";
	echo "<th>Action</th>";
	echo "</tr>";

while ($row = $result->fetch_assoc()) {

	$dateOfBirth = $row['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

	echo "<tr>";
		echo "<td>".$row['Acc_Uname']."</td>";
		echo "<td>".$row['Acc_Fname']." ".$row['Acc_Mname']." ".$row['Acc_Lname']." ".$row['Acc_NameExt']."</td>";
		echo "<td>".$row['Acc_Gender']."</td>";
		echo "<td>".$age."</td>";
		echo "<td>".$row['Acc_Bdate']."</td>";
		echo "<td>".$row['Acc_Ylevel']."</td>";
		echo "<td><a href=\"studedit.php?id=$row[Acc_Uname]\">Update</a></td>";	
		echo "</tr>";
}
	echo "</table>";
}
}
?>