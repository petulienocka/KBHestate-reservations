<?php
session_start();

if (!isset($_SESSION['client'])) {
	header('Location: index.php');
	exit();
}

require './admin/Connection.php';

// $query = $conn->query("SELECT * FROM `clients` WHERE `client_id` = '$email'") or die(mysqli_error());
// 	$fetch = $query->fetch_array();
?>