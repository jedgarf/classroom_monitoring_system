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
<html style="width: 1365px; height: 620px;">
<head>
	<title>Student Module</title>
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
	<h2>STUDENT MODULE</h2>
</div>
<div id="info">
	<br>
	<?php
		require 'dbcon.php';
		$sql1 = "SELECT * FROM tbl_1st_year WHERE Acc_Uname = '$user' union all SELECT * FROM tbl_2nd_year WHERE Acc_Uname = '$user' union all SELECT * FROM tbl_3rd_year WHERE Acc_Uname = '$user' union all SELECT * FROM tbl_4th_year WHERE Acc_Uname = '$user'";		
		$today = date("Y-m-d");
		if ($result = $conn->query($sql1)) {
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
	<a href="student_module.php"><li class="dropbtn">ATTENDANCE FORM
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
<div id="form" style="width: 1030px; height: 370px; text-align: center;">
<br><br><br>
	<form method="POST">
		<?php
	date_default_timezone_set("asia/manila");
		if (date("m") == 6 || date("m") == 7 || date("m") == 8) {
			$sem = "1st Semester";
		}elseif (date("m") == 9 || date("m") == 10 || date("m") == 11 || date("m") == 12 || date("m") == 1 || date("m") == 2 || date("m") == 3 || date("m") == 4 || date("m") == 5) {
			$sem = "2nd Semester";
		}
		?>
		<label>Select Subject: </label><select name="subj" class="lfield">
			<?php
			require 'dbcon.php';
			$sql = "select Sub_Code,Sub_Desc from tbl_subjects where Sub_Ylevel = '$ylevel' and Sub_Sem = '$sem'";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				echo "<option>".$row['Sub_Code']." - ".$row['Sub_Desc']."</option>";
			}
			?>
		</select><br><br><br>
		<label>Select Classroom: </label><select name="room" class="lfield">
			<?php
			$sql1 = "select Room_Code from tbl_classrooms";
			$result1 = $conn->query($sql1);
			while ($row1 = $result1->fetch_assoc()) {
				echo "<option>".$row1['Room_Code']."</option>";
			}
			?>
		</select><br><br><label>HOW MANY HOURS/MINUTES THIS SUBJECT:</label><br><br>
		<label>Select Hours: </label><select name="hours" class="sfield">
			<?php
			for ($h=1; $h <= 6; $h++) { 
				echo "<option>".$h."</option>";
			}
			?>
		</select> <label>Select Minutes: </label><select name="minutes" class="sfield">
			<?php
			$min = array(00,15,30,45);
			foreach ($min as $m) {
				echo "<option>".$m."</option>";
			}
			?>
		</select><br><br><br>
		<input type="submit" class="lbutton" name="submit" value="PRESENT">
		<?php
		if (isset($_POST['submit'])) {

			$subj = $_POST['subj'];
			$room = $_POST['room'];
			$h = $_POST['hours'];
			$m = $_POST['minutes'];

			$sql2 = "SELECT * FROM tbl_1st_year WHERE Acc_Uname = '$user' union all SELECT * FROM tbl_2nd_year WHERE Acc_Uname = '$user' union all SELECT * FROM tbl_3rd_year WHERE Acc_Uname = '$user' union all SELECT * FROM tbl_4th_year WHERE Acc_Uname = '$user'";

			$result2 = $conn->query($sql2);

			$row2 = $result2->fetch_assoc();

			$sid = $row2['Acc_Uname'];
			$fname = $row2['Acc_Fname'];
			$mname = $row2['Acc_Mname'];
			$lname = $row2['Acc_Lname'];
			$next = $row2['Acc_NameExt'];
			$gender = $row2['Acc_Gender'];
			$ylevel = $row2['Acc_Ylevel'];

			$sql3 = "insert into tbl_attendance_logs values ('$sid','$fname','$mname','$lname','$next','$gender','$ylevel','$subj','$room',now(),addtime(Att_Timein,'$h:$m:s'),now())";
			if ($conn->query($sql3)) {
					echo "Successed!";
					setcookie(type,"", time() + 3600, "/");
					setcookie(uname,"", time() + 3600, "/");
					header("location:index.php");
			}else{
				echo "Attendance Failed!";
			}

		}
		?>
	</form>
</div>
</body>
</html>