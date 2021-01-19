<?php
require "./server/Register-Process.php";
?>

<body>
	<div class="card text-center" >
  <div class="card-body">
	<h5 class="card-title">Welcome</h5>
	<br>
    <form method="post" action="">
					<input class="form-control" minlength="3" name="firstName" placeholder="First Name" required><br>
					<br>
					<input class="form-control" minlength="3" name="lastName" placeholder="Last Name" required><br>
					<br>
					<input class="form-control" name="email" type="email" placeholder="Email" required><br>
					<br>
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password" required><br>
					<br>
					<input class="form-control" minlength="5" name="password2" type="password" placeholder="Confirm Password" required><br>
					<br>
					<button class="register-button" name="submit" type="submit">Register</button><br>
				</form>
				<?php
				echo '<script>console.log("User is registered");</script>';
				?>
  </div>
</div>
</body>
