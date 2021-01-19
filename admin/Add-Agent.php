<?php
	if(ISSET($_POST['add_agent'])){
		$firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
		$password = $_POST['password'];
		$query = $conn->query("SELECT * FROM `agents` WHERE `email` = '$email'") or die(mysqli_error());
		$valid = $conn->num_rows;
		if($valid > 0){
			echo "<center><label style = 'color:red;'>lastName already taken</center></label>";
		}else{
            $conn->query("INSERT INTO `agents` (firstName, lastName, email, phone,  password) VALUES('$firstName', '$lastName', '$email', '$phone', '$password')")
             or die(mysqli_error());
			header("location: Team.php");
		}
	}
?>