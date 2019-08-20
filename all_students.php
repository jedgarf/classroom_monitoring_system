
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script type="text/javascript" src = "jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
<center>
<div id="se" style="text-align: center;">
	<form method="POST" autocomplete="off" action="stud_search_res.php" target="view_students">
	<label>Search by ID:</label><br><br><b>GC </b><input pattern="[0-9]{2}-[0-9]{3}" type="text" name="s" class="lfield" maxlength="6" placeholder="Student ID" required=""><br><br>
<input type="submit" id="sub" class="lbutton" name="sub" value="Search">
	</center>
</div><br><br>
</form>
<br>
<iframe src="student.php" width="100%" height="250px" name="view_students" style="border: none;"></iframe>
</body>
</html>	