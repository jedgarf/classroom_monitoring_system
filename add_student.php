
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
</head>
<body bgcolor="#b3ecff">
<form method="POST" autocomplete="off">
<br><br>
<table align="center">
	<tr><td colspan="1" align="center"><label>Student ID: GC</label><input pattern="[0-9]{2}-[0-9]{3}" type="text" class="lfield" name="sid" maxlength="6" placeholder="Student ID" required=""></td><td colspan="2"><label>Password: </label><input type="password" class="lfield" name="pass" maxlength="10" placeholder="Password" required=""></td></tr>
	<tr><td><br></td></tr>
	<tr><td align="center" colspan="3"><label>Confirm Password: </label><input type="password" class="lfield" name="repass" maxlength="10" placeholder="Password" required=""></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>First Name: </label><input pattern="[A-Za-z\s]{1,25}" type="text" class="lfield" name="fname" maxlength="25" placeholder="First Name" required=""></td><td colspan="2"><label>Middle Name: </label></label><input pattern="[A-Za-z\s]{1,25}" type="text" class="lfield" name="mname" maxlength="25" placeholder="Middle Name" required=""></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Last Name: </label><input pattern="[A-Za-z\s]{1,25}" type="text" class="lfield" name="lname" maxlength="25" placeholder="Last Name" required=""></td><td colspan="2"><label>Name Extension: </label><select name="ext" class="lfield">
			<option value="">None</option>
			<option value="Jr.">JR</option>
			<option value="Sr.">SR</option>
		</select></td></tr>
	<tr><td><br></td></tr>
	<?php
	date_default_timezone_set("asia/manila");
	?>
	<tr><td><label>Birth Date: </label><select name="year" class="sfield">
	<option><?php echo date("Y"); ?></option>
		<?php
		for ($y=1970; $y <= 2030; $y++) { 
			echo "<option>".$y."</option>";
		}
		?>
	</select> - <select name="month" class="sfield">
	<option><?php echo date("m"); ?></option>
		<?php
		for ($m=1; $m <= 12; $m++) { 
			echo "<option>".$m."</option>";
		}
		?>
	</select> - <select name="day" class="sfield">
	<option><?php echo date("d"); ?></option>
		<?php
		for ($d=1; $d <= 31; $d++) { 
			echo "<option>".$d."</option>";
		}
		?>
	</select></td> <td><label>Gender: <select name="gender" class="sfield">
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select></td><td><label>Year Level: </label><select name="ylevel" style="width: 90px; height: 30px; border: none; text-align: center;">
		<option>1st Year</option>
		<option>2nd Year</option>
		<option>3rd Year</option>
		<option>4th Year</option>
	</select></td></tr>
	<tr><td><br></td></tr>
	<tr><td><label>Security Question: <select class="lfield" name="quest">
		<option>What is Your Favorite Food?</option>
		<option>What is Your Favorite Color?</option>
		<option>What is Your Favorite Subject?</option>
		<option>Who is Your Favorite Teacher?</option>
		<option>What is Your Favorite Games?</option>
	</select></label></td><td colspan="2"><label>Answer: </label><input type="text" class="lfield" name="ans" maxlength="30" placeholder="Write the Answer" required=""></td></tr>
	<tr><td><br></td></tr>
	<tr><td colspan="3" align="center"><input type="submit" class="lbutton" name="submit" onclick="return $('#verify').show(3000);" value="Create this Account"></td></tr>
</table>
<?php
	if (isset($_POST['submit'])) {

	$id = $_POST['sid'];
	$sid = "GC".$id;
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$pas = md5($repass);
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$ext = $_POST['ext'];
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$bdate = $year."-".$month."-".$day;
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
	require 'dbcon.php';
	$sql1 = "insert into $table (Acc_Type,Acc_Uname,Acc_Pword,Acc_Fname,Acc_Mname,Acc_Lname,Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Ylevel,Acc_Quest,Acc_Ans) values ('Student','$sid','$pas','$fname','$mname','$lname','$ext','$gender','$bdate','$ylevel','$quest','$ans')";

					if ($pass == $repass) {
						if ($conn->query($sql1)) {
						?>

						<script type="text/javascript">
							alert("<?php echo $sid;?> is Successfully Added!");
						</script>

						<?php
					}else{
						?>

						<script type="text/javascript">
							alert("Adding Failed!");
						</script>

						<?php
					}	
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
</div>
</body>
</html>