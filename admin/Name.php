<?php
	require './Connection.php';
	$query = $conn->query("SELECT * FROM `agents` WHERE `agent_id` = '$_SESSION[agent_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
	$name = $fetch['name'];
?>