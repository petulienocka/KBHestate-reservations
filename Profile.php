<?php
require './admin/Connection.php';
require './server/PDO.php';
require './client/Client-Validation.php';

?>

<html lang="en">
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
<body id="body">
<?php require './components/Client-sidebar.php'; ?>
<div class="container mt-5">
<div class="row">
  <div class="col-6">
  <?php  
     $query = $conn->query("SELECT * FROM `clients` WHERE client_id = '" . $_SESSION['client'] . "'  ")
      or die(mysqli_error());
     // '" . $_SESSION['client_id'] . "' 
		while($fetch = $query->fetch_array()){
		?>
  <h2 class="houses-title" ><?php echo $fetch['firstName']." ".$fetch['lastName']?>'s Reservations</h2>
  <?php  
        }
    ?>
      <div class="col"><a href="./client/Client-Edit.php">Edit Profile</a></div>
      

    </div>
  <div class="col-6">
  <div class="mode">
            <label class="switch">
            <input class="checkbox" type="checkbox" id="checkBox" onclick="DarkLightMode()">
            <span class="slider"></span>
            </label>
            <p>Dark Mode</p>
</div>
  </div>
  </div>
  <?php  
  $new_date = date('d-m-Y', $date);
     $query = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `houses` NATURAL JOIN `clients` WHERE client_id = '" . $_SESSION['client'] . "'  ")
      or die(mysqli_error());
		while($fetch = $query->fetch_array()){
		?>
  <div class="row mt-5">
  <h4><?php echo $fetch['name']?></h4>
  <div class="col-6">
  <img class="reservation-image shadow" src = "./assets/properties/<?php echo $fetch['photo']?>"/>
  </div>

  <div class="col-6">
  <h5><?php echo $fetch['visitDay']?></h5>
  <hr/>
  <p>Time: <?php echo $fetch['timeStart']. " - " .$fetch['timeEnd']?></p>
<p>Address: <?php echo $fetch['city']. ", ". $fetch['street']. ", ". $fetch['postCode']?></p>
<p>Status: <?php echo $fetch['status'] ?></p>
  </div>
  </div>

    <?php
        }
    ?>
  </div>

</body>
</html>
<style>

#body {
  margin: 0;
  padding: 0;
  height: 100vh;
  width: 100vw;
  transition: background 0.3s ease;
}


.mode {
    float: right;
}


#body p {
  align-self: center;
  font-family: sans-serif;
  transition: color 0.3s ease;
}
/*TOGGLE COLORS*/
.dark {
  background: #545454;
  color: #efefef;
}
p {
  background: none !important;
}
/*SWITCH*/
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  align-self: center;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

input:checked + .slider {
  background-color: #2196f3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider {
  border-radius: 30px;
}

.slider:before {
  border-radius: 50%;
}
</style>
<script src="./assets/js/main.js"></script>
