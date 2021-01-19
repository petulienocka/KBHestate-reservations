<?php
     require_once '../admin/Connection.php';
     
	 $conn->query("DELETE FROM `clients` WHERE `client_id` = '" . $_SESSION['client'] . "'") or die(mysqli_error());
	 header("location: ../index.php");