<?php 
require 'auto_back-up.php';
 ?>
<?php
if (isset($_COOKIE['type']) && $_COOKIE['type'] == "Professor") {
	$user = $_COOKIE['uname'];
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Administrator") {
	header("location:administrator_module.php");
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Student") {
	header("location:student_module.php");
}else{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html style="width: 1365px; height: 620px;">
<head>
	<title>Professor Module</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body style="background-image: url('images/b.png'); background-attachment: fixed;">
<div id="header" style="height: 138px;"><hr>
<img id="logo1" src="images/neust.png" width="110px" height="110px" style="margin-right: -80px; margin-top: -5px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br>
	<b style="margin-right: -115px;">STUDENT AND CLASSROOM MONITORING SYSTEM</b>
	<img id="logo2" src="images/ne.png" width="110px" height="110px" style="margin-top: -86px;" align="right">
<hr></div>
<div id="search">
	<form target="view" method="GET" action="search.php" autocomplete="off">
		<label>SEARCH FOR STUDENT ATTENDANCE</label><br><br>
		<label style="size: 25px;">Search By ID: <b>GC </b></label><input pattern="[0-9]{2}-[0-9]{3}" type="text" name="s" class="lfield" style="width: 120px; height: 25px;" maxlength="6" placeholder="Student ID" required=""> - <select name="hati" class="lfield" style="width: 120px; height: 25px;">
			<option>Today</option>
			<option>Weekly</option>
			<option>Monthly</option>
		</select>
		<input type="submit" name="search" value="Search" style="width: 90px; height: 30px;">
	</form>
</div>
<div id="info">
	<br>
	<?php
		require 'dbcon.php';
		$sql = "select * from tbl_user_accounts where Acc_Uname = '$user'";
		$today = date("Y-m-d");
		if ($result = $conn->query($sql)) {
			while ($row = $result->fetch_assoc()) {

		$dateOfBirth = $row['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

				echo "<center><img src='images/user.png' width='150px' height='150px'></center>";
				echo "<h2 align = 'center'>".$row['Acc_Uname']."</h2>";
				echo "<big>Name: ".$row['Acc_Fname']." ".$row['Acc_Lname']."</big><br>";
				echo "<big>Account Type: ".$row['Acc_Type']."</big><br>";
				echo "<big>Gender: ".$row['Acc_Gender']."</big><br>";
				echo "<big>Age: ".$age."</big><br>";
			}
		}
	?><br><br>
</form>
</div>
<div id="nav">
<ul>
	<div class="dropdown">
	<li class="dropbtn">CLASSROOMS
  	<div class="dropdown-content">
    <a href="all_classrooms.php" target="view">View Vacant Clasrooms</a>
  	</div>
  	</li>
	</div>
	<div class="dropdown">
	<li class="dropbtn">STUDENTS
  	<div class="dropdown-content">
    <a href="add_student.php" target="view">Add Student</a>
    <a href="all_students.php" target="view">View All Students</a>
  	</div>
  	</li>
	</div>
	<div class="dropdown">
	<li class="dropbtn">ACCOUNTS
  	<div class="dropdown-content">
    <a href="prof_profedit.php" target="view">Change Profile</a>
    <a href="aboutus.php" target="view">About Us</a>
  	</div>
  	</li>
	</div> 
	<div class="dropdown">
	<a href="logout.php"><li class="dropbtn">LOG-OUT
	</li></a>
	</div>
</ul>
</div>
	<iframe src="all_classrooms.php" name="view" id="form"></iframe>
</body>
</html>