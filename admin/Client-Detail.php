<?php
require '../server/PDO.php';
require './Name.php';
require './Admin-Validation.php';

	  $pdo = pdo_connect_mysql();
	  $msg = '';
	  if (isset($_GET['client_id'])) {
		  $stmt = $pdo->prepare('SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` WHERE client_id = ?  ');
		  $stmt->execute([$_GET['client_id']]);
		  $client = $stmt->fetch(PDO::FETCH_ASSOC);
		  if (!$client) {
			  die ('client doesn\'t exist with that ID!');
		  }	  
	  } else {
		  die ('No ID specified!');
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
   
    <h2 class="houses-title" ><?php echo $client['firstName']." ".$client['lastName'] ?></h2>

    <div class="summary mt-5">
    <h6 class="mt-2"><strong class="summary-text">Email: </strong><?php echo $client['email']?></h6>
    <h6 class="mt-3"><strong class="summary-text">Member since: </strong><?php echo $client['dateMade']?></h6>
    </div>

<div class="reservations mt-5">
<div class="row mt-5 reservation-row">
    <div class="col-6">
    <img class="reservation-image shadow" src = "../assets/properties/<?php echo $client['photo']?>"/>
    </div>
    <div class="col-6">
    <h2><?php echo $client['name']?> - <?php echo $client['city']?></h2>
    <hr style="color: #70AA62;"/>
    <p><strong>Location: </strong><?php echo $client['street']?> , <?php echo $client['postCode']?> </p>
    <p><strong>Date of Visit: </strong><?php echo $client['visitDay']?></p>
    <p><strong>Time: </strong><?php echo $client['timeStart']?></p>
    <p><strong>How long: </strong><?php echo $client['hours']?> hours</p>
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
    <div class="footer text-center" style="padding-top: 300px;">
    <a href='../server/Logout.php'>Logout</a>
    <br>
    <span><i class='bx bxs-cog mt-5 mb-5'></i>Edit</span>
    </div>
  </div>
  </div>
  </div>
  </div> 
  </div>

</div>

 
</body>
</html>
<script src="../assets/js/main.js"></script>