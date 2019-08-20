
<?php
$d = date("d");
if ($d == 1) {
	exec("C:\wamp\bin\mysql\mysql5.1.53\bin\mysqldump --host=localhost --user=root --password=secret monitoring_system > D:\Monitoring_System_Automatic_Back-Up.sql");
}
?>