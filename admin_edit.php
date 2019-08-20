<?php
$id = $_COOKIE['uname'];

require 'dbcon2.php';

$sql2 = "SELECT * FROM tbl_user_accounts WHERE Acc_Uname = '$id'";
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
	$quest = $res['Acc_Quest'];
	$ans = $res['Acc_Ans'];
?>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
	<h3 align="center">Modify Administrator Profile</h3>
	<br/>
	
	<form name="form1" method="POST" autocomplete="off">
		<table border="0" align="center">
			<tr> 
				<td>Username:</td>
				<td><input type="text" class="lfield" name="studid" value="<?php echo $studid;?>" required></td>
			</tr>
			<tr> 
				<td>New Password:</td>
				<td><input type="Password"  class="lfield" name="pass" required></td>
			</tr>
			<tr> 
				<td>Confirm New Password:</td>
				<td><input type="Password"  class="lfield" name="repass" required></td>
			</tr>
			<tr> 
				<td>First Name:</td>
				<td><input type="text" pattern="[A-Za-z\s]{1,25}" class="lfield" name="fname" value="<?php echo $fname;?>" required></td>
			</tr>
			<tr> 
				<td>Middle Name:</td>
				<td><input type="text" pattern="[A-Za-z\s]{1,25}" class="lfield" name="mname" value="<?php echo $mname;?>" required></td>
			</tr>
			<tr> 
				<td>Last Name:</td>
				<td><input type="text" pattern="[A-Za-z\s]{1,25}" class="lfield" name="lname" value="<?php echo $lname;?>" required></td>
			</tr>
			<tr> 
				<td>Extension Name:</td>
				<td><select name="nameext" class="sfield">
					<option selected><?php echo $nameext; ?></option>
					<option value="">none</option>
					<option value="Jr.">JR</option>
					<option value="Sr.">SR</option>
				</select></td>
			</tr>
			<tr> 
				<td>Gender:</td>
				<td><select name="gender" class="sfield">
					<option><?php echo $gender; ?></option>
					<option>Male</option>
					<option>Female</option>
				</select></td>
			</tr>
			<tr> 
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
			</tr>
			<tr> 
				<td>Security Answer:</td>
				<td><input type="text" class="lfield" name="ans" value="<?php echo $ans;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td colspan="2" align="center"><input class="lbutton" type="submit" name="update" value="Update" onclick="return confirm('It Require to relogin after Updating!')"></td>
			</tr>
		</table>
	<?php

if(isset($_POST['update']))
{	
	$studid = $_POST['studid'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$nameext = $_POST['nameext'];
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	$quest1 = $_POST['quest'];
	$ans = $_POST['ans'];		

	
	$sql = "UPDATE tbl_user_accounts SET Acc_Uname = '$studid',Acc_Pword = md5('$pass'),Acc_Fname = '$fname',Acc_Mname = '$mname',Acc_Lname = '$lname',Acc_NameExt = '$nameext',Acc_Gender = '$gender',Acc_Bdate = '$bdate',Acc_Quest = '$quest1',Acc_Ans = '$ans' WHERE Acc_Uname = '$id'";
		if ($pass == $repass) {
			mysqli_query($mysqli,$sql);
			setcookie(type,"", time() + 3600, "/");
			setcookie(uname,"", time() + 3600, "/");
			?>
			<script type="text/javascript">
				alert("Changing Completed!");
				window.top.location.href = "index.php";
			</script>
			<?php
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
