<!DOCTYPE html>
<html>
<head>
	<title>Log-In</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body style="background-image: url('images/b.png'); background-attachment: fixed;">
<div id="header"><hr>
<img id="logo1" src="images/neust.png" width="115px" height="115px" style="margin-right: -80px; margin-top: -5px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br><br><hr>
	<h2><b>STUDENT AND CLASSROOM MONITORING SYSTEM</b></h2>
	<img id="logo2" src="images/ne.png" width="110px" height="110px" style="margin-top: -188px;" align="right">
<hr></div>
<div id="forpass">
	<form method="POST" autocomplete="off">
		<table>
			<tr><td>Username:</td></tr>
			<tr><td><input type="text" class="lfield" name="user" placeholder="Username" required="" autofocus="on"></td></tr>
			<tr><td><label>Security Question: </label></td></tr>
			<tr><td><select class="lfield" name="quest">
				<?php
				require 'dbcon.php';
				$sql = "select Acc_Quest from tbl_user_accounts union select Acc_Quest from tbl_1st_year union select Acc_Quest from tbl_2nd_year union select Acc_Quest from tbl_3rd_year union select Acc_Quest from tbl_4th_year";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<option>".$row['Acc_Quest']."</option>";
				}
				?>
			</select></td></tr>
			<tr><td><label>Answer: </label></td></tr>
			<tr><td><input type="text" class="lfield" name="ans" maxlength="30" placeholder="Answer" required=""></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" class="lbutton" name="submit" value="Log-In"></td></tr>
			<tr><td><a href="index.php"><input type="button" class="lbutton" name="back" value="Back"></a></td></tr>
		</table>
		<?php
				if (isset($_POST['submit'])) {

				$user = $_POST['user'];
				$quest = $_POST['quest'];
				$ans = $_POST['ans'];

				$sql1 = "select Acc_Type,Acc_Quest,Acc_Ans from tbl_user_accounts where Acc_Uname = '$user' 
				union all select Acc_Type,Acc_Quest,Acc_Ans from tbl_1st_year where Acc_Uname = '$user' 
				union all select Acc_Type,Acc_Quest,Acc_Ans from tbl_2nd_year where Acc_Uname = '$user' 
				union all select Acc_Type,Acc_Quest,Acc_Ans from tbl_3rd_year where Acc_Uname = '$user' 
				union all select Acc_Type,Acc_Quest,Acc_Ans from tbl_4th_year where Acc_Uname = '$user'";

				$result1 = $conn->query($sql1);
				if ($result1->num_rows >= 1) {
					$row1 = $result1->fetch_assoc();
						if ($row1['Acc_Quest'] == $quest && $row1['Acc_Ans'] == $ans) {
							if ($row1['Acc_Type'] == 'Administrator') {
								$type = $row1['Acc_Type']; 

						setcookie(type, $type, time() + (86400 * 30), "/"); 
						setcookie(uname, $user, time() + (86400 * 30), "/");
						header("location:administrator_module.php");

					}elseif ($row1['Acc_Type'] == 'Professor') {
						$type = $row['Acc_Type']; 

						setcookie(type, $type, time() + (86400 * 30), "/"); 
						setcookie(uname, $user, time() + (86400 * 30), "/");
						header("location:professor_module.php");

					}elseif ($row1['Acc_Type'] == 'Student') {
						$type = $row['Acc_Type']; 

						date_default_timezone_set("asia/manila");
						$curdate = date("Y-m-d");

						$res = $conn->query($sql1);
						$sql1 = "select * from tbl_attendance_logs where (Att_Timein <= now() and Att_Timeout >= now() and Att_Date = '$curdate') and Att_Uname = '$user'";


						if ($res->num_rows == 0) {

						setcookie(type, $type, time() + (86400 * 30), "/"); 
						setcookie(uname, $user, time() + (86400 * 30), "/");
						header("location:student_module.php");

						}elseif ($res->num_rows == 1) {

							?>

							<script type="text/javascript">
								alert("Your Account is not Valid to Log-In Right Now!");
							</script>

							<?php

						}
				}
							}else{

								echo '<script type="text/javascript">';
									echo 'alert("Your Question or Answer is Incorrect!");';
								echo "</script>";

							}

				}elseif ($result1->num_rows == 0) {
					
					echo '<script type="text/javascript">';
									echo 'alert("Your Username/Student ID is Incorrect!");';
								echo "</script>";


				}
			}
		?>
	</form>
</div>
</body>
</html>