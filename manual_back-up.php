<?php 
	if (exec("C:\wamp\bin\mysql\mysql5.1.53\bin\mysqldump --host=localhost --user=root --password=secret monitoring_system > D:\Monitoring_System_Back-Up.sql") == false) {
		?>

	 	<script type="text/javascript">
	 		alert("Back-Up Successfully!");
	 		window.location = "index.php";
	 	</script>

	 	<?php
	 }
?>