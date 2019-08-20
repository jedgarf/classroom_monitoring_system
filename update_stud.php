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
<div id="form" style="width: 1030px; height: 370px; text-align: center;">

<?php
$id = $user;

require 'dbcon2.php';

$sql2 = "SELECT * FROM tbl_1st_year WHERE Acc_Uname = '$id' union all SELECT * FROM tbl_2nd_year WHERE Acc_Uname = '$id' union all SELECT * FROM tbl_3rd_year WHERE Acc_Uname = '$id' union all SELECT * FROM tbl_4th_year WHERE Acc_Uname = '$id'";
$result = mysqli_query($mysqli,$sql2);

$res = mysqli_fetch_array($result);
	$studid = $res['Acc_Uname'];
	$pass = $res['Acc_Pword'];
	$fname = $res['Acc_Fname'];
	$mname = $res['Acc_Mname'];
	$nameext = $res['Acc_NameExt'];
	$lname = $res['Acc_Lname'];
	$gender = $res['Acc_Gender'];
	$bdate = $res['Acc_Bdate'];
	$ylevel = $res['Acc_Ylevel'];
	$quest = $res['Acc_Quest'];
	$ans = $res['Acc_Ans'];
?>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
	<h3 align="center">Update Student</h3>
	
	<form name="form1" method="POST" autocomplete="off" onsubmit="return confirm('It Require to Relog-in After Updating Your Account!')">
		<table border="0" align="center">
			<tr> 
				<td>Student ID:</td>
				<td><input type="text" pattern="[G][C][0-9]{2}-[0-9]{3}" class="lfield" name="studid" value="<?php echo $studid;?>" readonly required></td>
				<td>New Password:</td>
				<td><input type="Password"  class="lfield" name="pass" required></td>
			</tr>
			<tr> 
				<td>Confirm New Password:</td>
				<td><input type="Password"  class="lfield" name="repass" required></td>
			</tr>
			<tr> 
				<td>First Name:</td>
				<td><input type="text" pattern="[A-Za-z\s]{1,25}" class="lfield" name="fname" value="<?php echo $fname;?>" readonly required></td>
				<td>Middle Name:</td>
				<td><input type="text" pattern="[A-Za-z\s]{1,25}" class="lfield" name="mname" value="<?php echo $mname;?>" readonly required></td>
			</tr>
			<tr> 
				<td>Last Name:</td>
				<td><input type="text" pattern="[A-Za-z\s]{1,25}" class="lfield" name="lname" value="<?php echo $lname;?>" readonly required></td>
				<td>Extension Name:</td>
				<td><select name="nameext" class="sfield" readonly>
					<option selected><?php echo $nameext; ?></option>
					<option value="">none</option>
					<option value="Jr.">JR</option>
					<option value="Sr.">SR</option>
				</select></td>
			</tr>
			<tr> 
				<td>Gender:</td>
				<td><select name="gender" class="sfield">
					<option selected><?php echo $gender; ?></option>
					<option>M</option>
					<option>F</option>
				</select></td>
				<td>Birth Date:</td>
				<td><input type="date" class="lfield" name="bdate" value="<?php echo $bdate;?>" required></td>
			</tr>
			<tr> 
				<td>Security Question:</td>
				<td><select name="quest" class="lfield">
				<option selected><?php echo $quest; ?></option>
					<option>What is Your Favorite Food?</option>
					<option>What is Your Favorite Color?</option>
					<option>What is Your Favorite Subject?</option>
					<option>Who is Your Favorite Teacher?</option>
					<option>What is Your Favorite Games?</option>
				</select></td>
				<td>Year Level:</td>
				<td><select name="ylevel" class="lfield">
				<option selected><?php echo $ylevel; ?></option>
					<option>1st Year</option>
					<option>2nd Year</option>
					<option>3rd Year</option>
					<option>4th Year</option>
				</select></td>
			</tr>
			<tr> 
				<td>Security Answer:</td>
				<td><input type="text" class="lfield" name="ans" value="<?php echo $ans;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td colspan="4" align="center"><input class="lbutton" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	<?php

if(isset($_POST['update'])){

	$studid = $_POST['studid'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$nameext = $_POST['nameext'];
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	$ylevel = $_POST['ylevel'];
	$quest = $_POST['quest'];
	$ans = $_POST['ans'];

	if ($ylevel == "1st Year") {
		$table = "tbl_1st_year";
	}elseif ($ylevel == "2nd Year") {
		$table = "tbl_2nd_year";
	}elseif ($ylevel == "3rd Year") {
		$table = "tbl_3rd_year";
	}elseif ($ylevel == "4th Year") {
		$table = "tbl_4th_year";
	}
	
		$sql = "UPDATE $table SET Acc_Uname = '$studid',Acc_Pword = md5('$pass'),Acc_Fname = '$fname',Acc_Mname = '$mname',Acc_Lname = '$lname',Acc_NameExt = '$nameext',Acc_Gender = '$gender',Acc_Bdate = '$bdate',Acc_Ylevel = '$ylevel',Acc_Quest = '$quest',Acc_Ans = '$ans' WHERE Acc_Uname = '$id'";
		if ($pass == $repass) {
			mysqli_query($mysqli,$sql);
			require 'logout.php';
		}else{
			?>
			<script type="text/javascript">
				alert("Your Password is not Equal!");
			</script>
			<?php
		}
		
}
?>
	</form>
</body>
</html>

</div>
</body>
</html>