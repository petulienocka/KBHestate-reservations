<?php
require './admin/Connection.php';
require './server/PDO.php';
require './client/Client-Validation.php';

$pdo = pdo_connect_mysql();
	  $msg = '';
	  if (isset($_GET['house_id'])) {
		  $stmt = $pdo->prepare('SELECT * FROM houses WHERE house_id = ?');
		  $stmt->execute([$_GET['house_id']]);
		  $house = $stmt->fetch(PDO::FETCH_ASSOC);
		  if (!$house) {
			  die ('house doesn\'t exist with that ID!');
		  }
		 
		  
	  } else {
		  die ('No ID specified!');
	  }
?>
<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   <script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
   <link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
   <link rel="stylesheet" href="./assets/style/main.css">
   <link rel="stylesheet" href="./assets/style/animations.css">
   
	   <title>Client Profile</title>
	</head>
<body>

<?php require './components/Client-sidebar.php'; ?>
<div class="container-fluid">

<div class="row mt-5">
<div class="col-sm-9" style="padding-left: 300px;">
<h2 class="houses-title" ><?php echo $house['name']?></h2>
    <h6 class="card-subtitle mt-2"><?php echo $house['city']?></h6>
    <a href="./Offers.php"><i class='bx bx-left-arrow-alt mt-3'></i></a>
	
	<div class="row mt-3">
        <div class="col-6">
        <img class="img-fluid reservation-image shadow" src = "./assets/properties/<?php echo $house['photo']?>" style="width: 800px;" />
        <div class="row">
            <div class="col-6">
            <div class="property-price d-flex mt-5">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">$</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $house['price']?></h5>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-6">
            <div class="summary mt-5" >
        <h4 class="mt-2"><strong class="summary-text">Street: </strong><?php echo $house['street']?></h4>
        <h4 class="mt-2"><strong class="summary-text">Post Code: </strong><?php echo $house['postCode']?></h4>
        </div>
            </div>
        </div>
       

        </div>
        
        <div class="col-6">
		<form method="post" enctype = "multipart/form-data">
					
<select class="form-select" aria-label="Default select example" name="agent_id">
<option selected value="agent_id">Agent</option>
<?php  
	$query = $conn->query("SELECT * FROM `agents`") or die(mysqli_error());
	while($fetch = $query->fetch_array()) {
		echo "<option>" . $fetch['firstName'] . " " .$fetch['lastName'] . "</option>";
	}
?>
</select>

<div class = "form-group mt-5">
						<input type = "date" class = "form-control" name = "date"  />
		</div>
  <div class = "form-group mt-5">
						<input type = "time" class = "form-control" name = "timeStart"  />
		</div>
  <div class="mt-5">
    <a href="./Reserve-Process.php" class="house-btn">Reserve</a>
	<!-- <button type="submit" class="reserve-btn"><a>Reserve<</button> -->
  </div>
</form>
    </div>


</div>        

</div>
</div>

</div>

<?php require './Reserve-Process.php'; ?>
<!-- <div id="wave"></div>	 -->
</body>
</html>