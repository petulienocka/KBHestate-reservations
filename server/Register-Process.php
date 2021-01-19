<?php

$error = NULL;

if (isset($_POST['submit'])) {

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if(strlen($email ) < 1 ) {
		$error = "<p>Enter the valid name with more than 1 character.</p>";
	} elseif($password2 != $password) {
		echo "Password does not match";
	} else {
		$con = new mysqli('localhost', 'root', 'WebDev19', 'KBHestate');


        $firstName = $con->real_escape_string($firstName);
        $lastName = $con->real_escape_string($lastName);
		$email = $con->real_escape_string($email);
		$password = $con->real_escape_string($password);
		$password2 = $con->real_escape_string($password2);

		// Varification KEY generation 

		$keyVerification = md5(time() .$firstName);

		$hash = password_hash($password, PASSWORD_DEFAULT);
		$insert = $con->query("INSERT INTO clients (firstName, lastName, email, password, keyVerification) VALUES 
		('$firstName', '$lastName', '$email', '$hash', '$keyVerification')");

		if ($insert) {
			$to = $email;
			$subject = "Verify Your Email";
			$message = "<a href='http://localhost:88/KBHestate/KBHestate/server/Verification.php?keyVerification=$keyVerification'>Register</a>";
			$headers = "From : frederik.petersen8@yahoo.com \r\n";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers = "Content-type:text/html;charser=UTF-8". "\r\n";

			mail($to, $subject, $message, $headers);
			header('location: Login.php');

		}else {
			echo $con->error;
		}
	}
    
    }
?>