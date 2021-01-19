<?php 
	session_start();
	if(!ISSET($_SESSION['agent'])){
		header("location:index.php");
	}