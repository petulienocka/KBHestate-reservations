<?php
session_start();
$msg = "";

if(isset($_POST['submit'])) {
	
    $con = new mysqli('localhost', 'root', 'WebDev19', 'KBHestate');

    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

   $sql = $con->query("SELECT * FROM clients WHERE email = '$email' LIMIT 1");

    if($sql->num_rows !=0) {
		
        $row = $sql->fetch_assoc();
        $email = $row['email'];
        $client_id = $row['client_id'];

		if(!password_verify($password,$row['password']))
		{
			$msg = "email or password is not correct";
		}elseif($row['verified'] != 1)
		{

			$msg = "Your account has not been verified, please check your email $email or <a href='#'>resend</a>.";
		}else{
            $_SESSION['client'] = TRUE;
            $_SESSION ['client'] = $email;
            $_SESSION ['client'] = $client_id;
           
            header('Location: Profile.php');
            // $msg = "WELCOME" . $_SESSION['client'] . " - <a href='./server/Logout.php'>Logout</a>";

        }
        
	}
}
if(!isset($_SESSION['client'])) {
    echo '<script>console.log("Welcome guest!")</script>';
}
?>