<?php
require 'auto_back-up.php';
?>
<?php
if (isset($_COOKIE['type']) && $_COOKIE['type'] == "Administrator") {
	header("location:administrator_module.php");
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Professor") {
	header("location:professor_module.php");
}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Student") {
	header("location:student_module.php");
}else{
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log-In</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body style=" background-image: url('images/b.png'); background-attachment: fixed;">
<div id="header"><hr>
<img id="logo1" src="images/neust.png" width="115px" height="115px" style="margin-right: -80px; margin-top: -5px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br><br><hr>
	<h2><b>STUDENT AND CLASSROOM MONITORING SYSTEM</b></h2>
	<img id="logo2" src="images/ne.png" width="110px" height="110px" style="margin-top: -188px;" align="right">
<hr></div>
<div id="login">
	<form method="POST" autocomplete="off">
		<table>

			<tr><td>Username:</td></tr>
			<tr><td><input type="text" class="lfield" name="user" placeholder="Enter Your Username" required="" autofocus="on"></td></tr>
			<tr><td>Password:</td></tr>
			<tr><td><input type="password" class="lfield" name="pass" placeholder="Enter Your Password" required=""></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" class="lbutton" name="submit" value="Log-In"></td></tr>
			<tr><td><br></td></tr>
			<tr><td><u><a href="forgot_pass.php">Forgot Password?</a></u></td></tr>
		</table><hr>
		<?php
			require 'dbcon.php';
			if (isset($_POST['submit'])) {

				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$pas = 	md5($pass);

				$sql = "select Acc_Type,Acc_Uname,Acc_Pword from tbl_user_accounts where Acc_Uname = '$user' and Acc_Pword = '$pas' 
				union all select Acc_Type,Acc_Uname,Acc_Pword from tbl_1st_year where Acc_Uname = '$user' and Acc_Pword = '$pas' 
				union all select Acc_Type,Acc_Uname,Acc_Pword from tbl_2nd_year where Acc_Uname = '$user' and Acc_Pword = '$pas' 
				union all select Acc_Type,Acc_Uname,Acc_Pword from tbl_3rd_year where Acc_Uname = '$user' and Acc_Pword = '$pas' 
				union all select Acc_Type,Acc_Uname,Acc_Pword from tbl_4th_year where Acc_Uname = '$user' and Acc_Pword = '$pas'";

			$result = $conn->query($sql);

			if ($result->num_rows == 1) {

				while ($row = $result->fetch_assoc()) {
					$type = $row['Acc_Type']; 

						if ($row['Acc_Type'] == 'Administrator') {

					setcookie(type, $type, time() + (86400 * 30), "/"); 
					setcookie(uname, $user, time() + (86400 * 30), "/");
						header("location:administrator_module.php");

					}elseif ($row['Acc_Type'] == 'Professor') {

					setcookie(type, $type, time() + (86400 * 30), "/"); 
					setcookie(uname, $user, time() + (86400 * 30), "/");
						header("location:professor_module.php");

					}elseif ($row['Acc_Type'] == 'Student') {

						date_default_timezone_set("asia/manila");

						$sql1 = "select * from tbl_attendance_logs where (Att_Timein <= now() and Att_Timeout >= now() and Att_Date = curdate()) and Att_Uname = '$user'";

						$res = $conn->query($sql1);

						if ($res->num_rows == 0) {

						setcookie(type, $type, time() + (86400 * 30), "/"); 
						setcookie(uname, $user, time() + (86400 * 30), "/");
						header("location:student_module.php");

						}elseif ($res->num_rows == 1) {

							echo "<br><center>You're Currently in Another Classroom!</center>";

						}
				}
			}

			}else{

				echo '<script type="text/javascript">';
				echo 'alert("Invalid Account!");';
				echo "</script>";
			}
		}
		?>
	</form>
</div>
<div id="vm">
	<big>MISSION:</big>
	<p style="text-align: justify; text-indent: 50px;">As provided for in RA 8612,NEUST's mission is two fold: to primarily provide advanced instruction, professional training in arts, science and technology, education and other related fields, undertake research and extension services, and provide progressive leadership in these areas; and to offer graduate, undergraduate and short term technical courses within it's areas of specialization and according to it's capabilities, considering the needs of the province, the region and the country.</p>
	<big>VISION:</big>
	<p style="text-align: justify; text-indent: 50px;">The University envisions to be recognized educational leader in Region III managed by committed and ethical public servants where a culture of excellence, high ethical standards and solidarity thrives and prospers in each of the University's academic and administrative departments and units; and each college, institute and campus is a center of development/excellence in instruction, research, extension, services, production, sports and cultural development, thereby transforming students, alumni and other clientele into high quality, competent and ethical leaders, professionals and/or middle level manpower inthe fields of science, technology, education, management,arts and technology-based education and training.</p>
</div>
<div id="footer">
	<big>Copyright &copy;
	<?php
	//date_default_timezone_set("asia/manila");
	$y1 = "2017";
	echo $y1;
	?>
	</big>
</div>
</body>
</html>