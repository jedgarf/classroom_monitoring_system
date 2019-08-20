
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<style type="text/css">
		select,input{
			border: none;
		}
		.lfield{
			width: 180px;
		}
		.mfield{
			width: 200px;
			height: 30px;
		}
		.sfield{
			width: 50px;
		}
		.w3-table-all{border:1px solid #ccc}
.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid #ddd}
.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
.w3-table-all tr:nth-child(odd){background-color:#fff}
.w3-table-all tr:nth-child(even){background-color:#f1f1f1}
.w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}
.w3-centered tr th,.w3-centered tr td{text-align:center}
.w3-table td,.w3-table th,.w3-table-all td,.w3-table-all th{padding:10px 13px;display:table-cell;text-align:left;vertical-align:top}
.w3-table th:first-child,.w3-table td:first-child,.w3-table-all th:first-child,.w3-table-all td:first-child{padding-left:16px}
.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid #ddd}
.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
.w3-card-4,.w3-hover-shadow:hover{box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important}
	</style>
</head>
<body bgcolor="#b3ecff">
<div style="float: left; border-right: 1px;">
	<form method="POST" autocomplete="off">
<h2 align="center">Add Professor:</h2>
<table cellspacing="20px">
	<tr><td><label>Username: </label><br><input class="lfield" type="text" name="sid" maxlength="30" placeholder="Username" required=""></td><td colspan="2"><label>Password: </label><br><input class="lfield" type="password" name="pass" maxlength="10" placeholder="Password" required=""></td></tr>
	<tr><td colspan="2" align="center"><label>Confirm Password: </label><br><input class="lfield" type="password" name="repass" maxlength="10" placeholder="Password" required=""></td></tr>
	<tr><td><label>First Name: </label><br><input class="lfield" type="text" name="fname" maxlength="25" placeholder="First Name" pattern="[A-Za-z]{1,25}" required=""></td>
	<td><label>Middle Name: </label><br><input class="lfield" type="text" name="mname" maxlength="25" placeholder="Middle Name" pattern="[A-Za-z]{1,25}" required=""></td></tr>
	<tr><td><label>Last Name: </label><br><input class="lfield" type="text" name="lname" maxlength="25" placeholder="Last Name" pattern="[A-Za-z]{1,25}" required=""></td><td><label>Name Extension: </label><br>
		<select name="ext" class="lfield">
			<option value="">None</option>
			<option value="Jr.">JR</option>
			<option value="Sr.">SR</option>
		</select>
	</td></tr>
	<?php
	date_default_timezone_set("asia/manila");
	?>
	<tr><td><label>Birth Date: </label><br><select name="year" class="sfield">
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
	</select></td><td><label>Security Question: </label><br><select name="quest" class="mfield">
		<option>What is Your Favorite Food?</option>
		<option>What is Your Favorite Subject?</option>
		<option>Who is Your Favorite Teacher?</option>
		<option>What is Your Favorite Games?</option>
	</select></td></tr>
	<tr><td><label>Gender: </label><br><select name="gender" class="lfield">
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select></td>
	<td colspan="2"><label>Answer: </label><br><input class="lfield" type="text" name="ans" maxlength="30" placeholder="Answer" required=""></td></tr>
	<tr><td><br></td></tr>
	<tr><td colspan="3" align="center"><input type="submit" class="lbutton" name="submit" value="Create this Account"></td></tr>
</table>
<?php
	require 'dbcon.php';
	if (isset($_POST['submit'])) {

	$id = $_POST['sid'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$ext = $_POST['ext'];
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$bdate = $year."-".$month."-".$day;
	$quest = $_POST['quest'];
	$ans = $_POST['ans'];
	$sql1 = "insert into tbl_User_Accounts (Acc_Type,Acc_Uname,Acc_Pword,Acc_Fname,Acc_Mname,Acc_Lname,Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Quest,Acc_Ans) values ('Professor','$id',md5('$pass'),'$fname','$mname','$lname','$ext','$gender','$bdate','$quest','$ans')";

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
<div style="float: right; margin-right: 5px;">
<h2 align="center">List of Professor(s):</h2>
	<table width="100%" cellpadding="50px" class="w3-table w3-bordered w3-striped w3-card-4">

	<tr bgcolor='#CCCCCC'>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Birth Date</th>
		<th>Action</th>
	</tr>
	<?php 
	require 'dbcon.php';
	$sql = "select * from tbl_user_accounts where Acc_Type = 'Professor'";
	$today = date("h:i:s");
	$result = $conn->query($sql);
	while($res = $result->fetch_assoc()) { 	

		$dateOfBirth = $res['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<tr>";
		echo "<td>".$res['Acc_Fname']." ".$res['Acc_Lname']." ".$res['Acc_NameExt']."</td>";
		echo "<td>".$res['Acc_Gender']."</td>";
		echo "<td>".$age."</td>";
		echo "<td>".date("F-d-Y",strtotime($res['Acc_Bdate']))."</td>";
		echo "<td><a href=\"profedit.php?id=$res[Acc_Uname]\">Update</a> | <a href=\"prof_delete.php?id=$res[Acc_Uname]\" onClick=\"return confirm('Are you sure you want to fired this Professor?')\">Remove</a></td>";		
	}
	?>
	</table>
</div>
</body>
</html>