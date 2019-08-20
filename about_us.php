<?php 
require 'auto_back-up.php';
 ?>
<?php
if (isset($_COOKIE['type']) && $_COOKIE['type'] == "Student") {
	$user = $_COOKIE['uname'];
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Professor") {
	header("location:professor_module.php");
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Administrator") {
	header("location:administrator_module.php");
}else{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Module</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body style="background-image: url('images/b.png'); background-attachment: fixed;">
<div id="header" style="height: 138px;"><hr>
<img id="logo1" src="images/ne.png" width="110px" height="110px" style="margin-right: -80px; margin-top: -5px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br>
	<b style="margin-right: -150px;">STUDENT AND CLASSROOM MONITORING SYSTEM</b>
	<img id="logo2" src="images/neust.png" width="110px" height="110px" style="margin-top: -86px;" align="right">
<hr></div>
<div id="search">
	<h2>STUDENT MODULE</h2>
</div>
<div id="info">
	<?php
		require 'dbcon.php';
		$sql = "select * from tbl_1st_year where Acc_Uname = '$user' union all select * from tbl_2nd_year where Acc_Uname = '$user' union all select * from tbl_3rd_year where Acc_Uname = '$user' union all select * from tbl_4th_year where Acc_Uname = '$user'";		

		$today = date("Y-m-d");
		if ($result = $conn->query($sql)) {
			while ($row = $result->fetch_assoc()) {

		$dateOfBirth = $row['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

				echo "<center><img src='images/user.png' width='150px' height='150px'></center>";
				echo "<h2 align = 'center'>".$row['Acc_Uname']."</h2>";
				echo "<big>Name: <br>".$row['Acc_Fname']." ".$row['Acc_Lname']."</big><br><br>";
				echo "<big>Gender: ".$row['Acc_Gender']."</big><br>";
				echo "<big>Age: ".$age."</big><br>";
				$ylevel = $row['Acc_Ylevel'];
				$user = $row['Acc_Uname'];
			}
		}
	?>
</div>
<div id="nav">
<ul>	
	<div class="dropdown">
	<a href="student_module.php"><li class="dropbtn">Attendance Form
	</li></a>
	</div>
	<div class="dropdown">
	<li class="dropbtn">ACCOUNTS
  	<div class="dropdown-content">
    <a href="update_stud.php">Change Profile</a>
    <a href="about_us.php">About Us</a>
  	</div>
  	</li>
	</div>
	<div class="dropdown">
	<a href="logout.php"><li class="dropbtn">LOG-OUT
	</li></a>
	</div>
</ul>
</div>
<div id="form" style="width: 1025px; height: 370px; text-align: center;">
<div align="center">
	<h2 align="center">This Project is Dedicated to our School NEUST GAEC</h2>
<h4 align="center">For More Suggestion Please Contact here: jedgarf1@outlook.com</h4>
<img src="images/monitor.png">
</div>
</div>
</body>
</html>