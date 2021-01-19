<?php
	require_once './Connection.php';
	$timeStart = date("H:i:s", strtotime("+8 HOURS"));
	$conn->query("UPDATE `reservations` SET `timeStart` = '$timeStart', `status` = 'Bought' WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
	header("location: Dashboard.php");
?>