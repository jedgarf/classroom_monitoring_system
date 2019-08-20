<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
</head>
<div id="all_stud">
<form method="GET" autocomplete="off">
	<h2 align="center">All Student(s):</h2><br>
		<table class="table table-condensed" width='60%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Birth Date</th>
		<th>Year Level</th>
		<th>Action</th>
	</tr>
	<?php 
	require 'dbcon.php';
	$sql = "select * from tbl_1st_year union all select * from tbl_2nd_year union all select * from tbl_3rd_year union all select * from tbl_4th_year order by Acc_Uname";
	$today = date("h:i:s");
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'>Nothing Follows.</td></tr>";
	}else{
	while($res = $result->fetch_assoc()) { 	

		$dateOfBirth = $res['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<tr>";
		echo "<td>".$res['Acc_Uname']."</td>";
		echo "<td>".$res['Acc_Fname']." ".$res['Acc_Mname']." ".$res['Acc_Lname']." ".$res['Acc_NameExt']."</td>";
		echo "<td>".$res['Acc_Gender']."</td>";
		echo "<td>".$age."</td>";
		echo "<td>".date("F-d-Y",strtotime($res['Acc_Bdate']))."</td>";
		echo "<td>".$res['Acc_Ylevel']."</td>";	
		echo "<td><a href=\"studedit.php?id=$res[Acc_Uname]\">Update</a></td>";	
		echo "</tr>";	
	}
	echo "</table>";
	}
	?>
	</form>
</div>