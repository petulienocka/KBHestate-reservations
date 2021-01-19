<?php 
session_start();
require_once("./Connection.php");

if(isset($_POST['submit'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	$sql = "select * from agents where email = '".$email."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  == 1){
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['password'])){
            $_SESSION['agent'] = TRUE;
			$_SESSION ['agent'] = $email;
			
			header('location: Dashboard.php');
		}
		else{
			echo "Wrong password - please try again";
		}
	}
	else{
		echo "The user with this email is not registered.";
	}
}
if(!isset($_SESSION['agent'])) {
    echo "Welcome Agent. <p />";
}
 

?>
<html>
    <body>
    <div class="card text-center" >
  <div class="card-body">
    <h5 class="card-title">Login</h5>
    <form action="" method="post">
        <input class="form-control" name="email" type="email" placeholder="Email..." required><br>
        <br/>
        <input class="form-control" minlength="5" name="password" type="password" placeholder="Password..." required><br>
        <br/>
        <input class="btn btn-primary" name="submit" type="submit" value="Login..."><br>
        </form>
        <?php if(isset($msg)){echo $msg;} ?>
  </div>
</div>




</body>
</html>