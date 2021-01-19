
<?php 
require_once("./Connection.php");


if(isset($_POST['submit'])){
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
        $email 	= $_POST['email'];
        $phone 	= $_POST['phone'];
		$password = $_POST['password'];
		
		$options = array("cost"=>5);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
		
		$sql = "insert into agents (firstName, lastName, email, phone, password) values ('".$firstName."', '".$lastName."', '".$email."','".$phone."','".$hashPassword."')";
		$result = mysqli_query($conn, $sql);
		if($result)
		{
			echo "Registration successfully";
		}else {
            echo("Error description: " . $conn->error);
        }
	}
?>
 
<h1>Registration Form</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="firstName" value="" placeholder="First Name">
	<input type="text" name="lastName" value="" placeholder="Surname">
	<input type="text" name="email" value="" placeholder="Email">
    <input type="text" name="phone" value="" placeholder="Phone">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="submit">Submit</button>
</form>