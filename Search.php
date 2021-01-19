<?php

require './admin/Connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   
</head>
<body>
<div class="w3-container">
<form  action="./Results.php" method="post">
<div class="w3-row-padding w3-padding-64">


<div class="w3-third"  data-aos="zoom-out-up" data-aos-duration="2000">

<input  class="w3-input w3-border" name="city" type="text" list="city" autocomplete=off placeholder="Enter the name of the city" required>
            <datalist id="city">
            <?php  
	$query = $conn->query("SELECT * FROM `houses`") or die(mysqli_error());
	while($fetch = $query->fetch_array()){
	?>
  <option><?php echo $fetch['city']?></option>
  <?php
	}
	?>
</datalist>
</div>

<div >
<button name="search" class="w3-button w3-black">Search</button>
</div>
</div>
</form>
</div>
</body>
</html>
