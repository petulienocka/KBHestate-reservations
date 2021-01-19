<?php
require '../server/Client-Validation.php';
require '../admin/Connection.php';

if(ISSET($_POST['edit_account'])){
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$conn->query("UPDATE `clients` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `password` = '$password', 
	 WHERE `client_id` = '$_SESSION[client_id]'") or die(mysqli_error());
	header("location: Profile.php");
} else {
	echo "Does not work";
}

?>

<html>
<head>
</head>
<body>
				<?php
					$query = $conn->query("SELECT * FROM `clients` WHERE `client_id` = '" . $_SESSION['client'] . "'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" action = "">
						<div class = "form-group">
							<label>First Name </label>
							<input type = "text" class = "form-control" value = "<?php echo $fetch['firstName']?>" name = "firstName" />
						</div>
						<div class = "form-group">
							<label>Last name </label>
							<input type = "text" class = "form-control" value = "<?php echo $fetch['lastName']?>" name = "lastName" />
						</div>
                        <div class = "form-group">
							<label>Email </label>
							<input type = "email" class = "form-control" value = "<?php echo $fetch['email']?>" name = "email" />
						</div>
						<div class = "form-group">
							<label>Password </label>
							<input type = "password" class = "form-control" value = "<?php echo $fetch['password']?>" name = "password" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "edit_account" class = "form-control"> Save</button>
						</div>
					</form>
				</div>
			</div>
</body>

</html>