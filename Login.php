<?php
require "./server/Login-Process.php";
?>

<html>
    <body>
    <div class="card text-center" >
  <div class="card-body">
    <h5 class="card-title"><i class='bx bxs-user-circle' style="font-size: 50px;"></i></h5>
    <br>
    <form action="" method="post">
        <input class="form-control" name="email" type="email" placeholder="Email..." required><br>
        <br/>
        <input class="form-control" minlength="5" name="password" type="password" placeholder="Password..." required><br>
        <br/>
        <button class="login-button" name="submit" type="submit">Login</button><br>
        </form>
        <?php if(isset($msg)){echo $msg;} ?>
  </div>
</div>




</body>
</html>