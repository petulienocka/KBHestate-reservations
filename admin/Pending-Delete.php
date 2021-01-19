<?php
	require_once './Connection.php';
	$conn->query("DELETE FROM `reservations` WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
	header("location: Dashboard.php");
?>