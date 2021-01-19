<?php 
	session_start();
	if(!ISSET($_SESSION['client'])){
		header("location:index.php");
	}