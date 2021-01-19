<?php
require './Name.php';
require './Admin-Validation.php';

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


<html lang="en">
<head>
<!-- <meta http-equiv="refresh" content="600; url=../server/Logout.php" /> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
   
   
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
<script src="https://kit.fontawesome.com/6e0e6df0b8.js" crossorigin="anonymous"></script>

    

<link rel="stylesheet" href="../assets/style/main.css">
    <link rel="stylesheet" href="../assets/style/animations.css">

    <title>Admin Dashboard</title>
</head>
<body>
<div class="container-fluid">
  
<?php  require '../components/Admin-sidebar.php'; ?>
  <div class="row">
    
    <div class="col-sm-9 mt-5" style="padding-left: 300px;">
    <h2 class="houses-title" >Agents</h2>
    

 <div class="team" id="team">
 <button class = "btn-add mt-5"><a data-bs-toggle="modal" data-bs-target="#agentModal"> Add New</a></button>
 
 <div class="modal fade" id="agentModal" tabindex="-1" aria-labelledby="agentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method = "POST">
        <div class="row">
          <div class="col-6">
          <div class = "form-group">
							<label>First Name </label>
							<input type = "text" class = "form-control" name = "firstName" />
						</div>
          </div>
          <div class="col-6">
          <div class = "form-group">
							<label>Last Name </label>
							<input type = "text" class = "form-control" name = "lastName" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class = "form-group">
							<label>Email</label>
							<input type = "text" class = "form-control" name = "email" />
          </div>
          </div>
          <div class="col-6">
          <div class = "form-group">
							<label>Phone</label>
							<input type = "text" class = "form-control" name = "phone" />
						</div>
          </div>
        </div>

 <div class="form-group">
   <div class="row">
     
   <div class="col-6">
     <label>Password</label>
    <div class="input-group" id="show_hide_password">
      <input id="myInput" class="form-control" type="password" name="password">
     </div>
     </div>
    
     <div class="col-6 mt-4">
     <div class="input-group-addon">
      <input type="checkbox" onclick="showPassword()"><span> Show Password</span>
      </div>
     </div>
   </div>
    </div>
  

<div class = "form-group mt-3">
			<button name = "add_agent" class = "form-control add-agent">ADD AGENT</button>
</div>
					</form>
      </div>
    </div>
  </div>
</div>
 
      <div class="container-2">
        
        <div class="row">  
            <div class="title-wrap d-flex justify-content-center" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">
            </div>
        </div>
        
        <div class="row">
        <?php  
							$query = $conn->query("SELECT * FROM `agents`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
          <div class="col-md-4 text-center">
            <div class="card-box-d" data-aos="flip-left"  data-aos-duration="1500">
              <div class="card-img-d">
                <img src="../assets/images/avatar.png" alt="" class="img-d img-fluid mb-5">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="Agent-Detail.html" class="team-link"><?php echo $fetch['firstName']." ".$fetch['lastName']?></a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> <?php echo $fetch['phone']?></p>
                    <p>
                      <strong>Email: </strong> <?php echo $fetch['email']?></p>
                      <button class="team-button mt-5">VIEW</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
							}
						?>
        </div>
      </div>

    </div>
    </div>
    
    <div class="col-3">

  <div id="agent-info" >
  <div class="right-side-bar shadow position-fixed" style="background-color: #f5f5f5; width: 500px;">
  <div class="main-info text-center" id="main-info">
  <h3 class="text-center mt-5" style="padding-top: 50px;">AGENT</h3>
  <img class="mt-5 side-img" src="../assets/images/image-review.jpg" alt="agent-photo" width="200px;" style="">
    <p class="mt-5"><strong>Kathrine Whoknows</strong> </p>
    <hr>
  </div>
    <div class="credentials float-start mt-5 ml-3">
    <p><strong>Email:</strong> <?php echo  $_SESSION['agent'] ?></p>
    <p><strong>Phone:</strong> 44678900</p>
    </div>
    <div class="footer text-center" style="padding-top: 250px;">
    <a href='../server/Logout.php'>Logout</a>
    <br>
    <span><i class='bx bxs-cog mt-5 mb-5 mr-2' style="color: #243e56; font-size: 20px;"></i>Edit</span>
    </div>
    <div class="language-switcher text-center mb-5">
    <a href="Dashboard.php?la=en"><img class="ml-3" src="../assets/images/flag_uk.png" alt="<?=$lang['lang-en'];?>" title="<?=$lang['lang-en'];?>" style="width: 35px;"/><span class="ml-3"><?=$lang['lang-en'];?></span></a>
<a href="Dashboard.php?la=dk"><img class="ml-3" src="../assets/images/flag_dk.png" alt="<?=$lang['lang-dk'];?>" title="<?=$lang['lang-dk'];?>" style="width: 35px;"/><span class="ml-3"><?=$lang['lang-dk'];?></span></a>
    </div>
    </div>
  </div>
  </div>
  </div>
  </div> 
  </div>

</div>

 
</body>

<script>
function showPassword() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>
<script src="../assets/js/main.js"></script>
