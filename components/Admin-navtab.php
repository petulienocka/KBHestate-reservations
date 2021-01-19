<?php
require '../admin/Name.php';
require '../admin/Admin-Validation.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
<style>
.nav-pills .nav-link.active  {
    background-color: #f5f5f5;
    border: 2px solid #243e56;
    color: #243e56;
}
.nav-pills .nav-link  {
    background-color: #f5f5f5;
    color: #243e56;
}
</style>

<body>

<div id="admin-navtab">
<?php
				$pending = $conn->query("SELECT COUNT(*) as total FROM `reservations` WHERE `status` = 'Pending'") or die(mysqli_error());
				$fetch_pending = $pending->fetch_array();
				$approval = $conn->query("SELECT COUNT(*) as total FROM `reservations` WHERE `status` = 'Approved'") or die(mysqli_error());
        $fetch_approval = $approval->fetch_array();
        $buyers = $conn->query("SELECT COUNT(*) as total FROM `reservations` WHERE `status` = 'Bought'") or die(mysqli_error());
				$fetch_buyers = $buyers->fetch_array();
			?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-pendings-tab" data-bs-toggle="pill" href="#pills-pendings" role="tab" aria-controls="pills-pendings" aria-selected="true">
    <span style="color: #243e56; font-size: 25px;" class = "badge"><?php echo $fetch_pending['total']?></span>
    Pendings</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-approved-tab" data-bs-toggle="pill" href="#pills-approved" role="tab" aria-controls="pills-approved" aria-selected="false">
    <span style="color: #243e56; font-size: 25px;" class = "badge"><?php echo $fetch_approval['total']?></span>
    Approved</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-bought-tab" data-bs-toggle="pill" href="#pills-bought" role="tab" aria-controls="pills-bought" aria-selected="false">
    <span style="color: #243e56; font-size: 25px;" class = "badge"><?php echo $fetch_buyers['total']?></span>
    Bought</a>
  </li>
</ul>


<div class="tab-content" id="pills-tabContent">


  <div class="tab-pane fade show active" id="pills-pendings" role="tabpanel" aria-labelledby="pills-pendings-tab">
  
  <table class="table" id="pending-list">
  			<thead class="table" style="background-color: #243e56; color: white;">
        <tr>
							<th>Client's Name</th>
							<th>House</th>
							<th>Day</th>
							<th>Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
  			</thead>
  			<tbody>
        <?php
              $query = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` WHERE `status` = 'Pending' ORDER BY firstName") 
              or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
              <td> <a style="color: #243e56;" href = "./Client-Detail.php?client_id=<?php echo $fetch['client_id']?>">
         <?php echo $fetch['firstName']." ".$fetch['lastName']?></a></td>      

 
							<td><?php echo $fetch['name']?></td>
							<td><strong><?php if($fetch['visitDay'] <= date("Y-m-d", strtotime("+8 HOURS"))){echo "<label style = 'color: grey;'>"
								.date("d M, Y", strtotime($fetch['visitDay']))."</label>";}else{echo "<label style = 'color: grey;'>"
								.date("d M, Y", strtotime($fetch['visitDay']))."</label>";}?></strong></td>
							<td><?php echo $fetch['timeStart']?></td>
							<td><?php echo $fetch['status']?></td>
							<td><a class = "btn btn-success" href = "Confirmation.php?reservation_id=<?php echo $fetch['reservation_id']?>"
							><i class='bx bx-check'></i></a> <a class = "btn btn-danger"
							href = "Pending-Delete.php?reservation_id=<?php echo $fetch['reservation_id']?>"><i class='bx bx-x'></i> </a></td>
						</tr>
						<?php
							}
						?>
  			</tbody>
      </table>
  
  </div>
  <div class="tab-pane fade" id="pills-approved" role="tabpanel" aria-labelledby="pills-approved-tab">
  <table class="table">
  			<thead class="table" style="background-color: #243e56; color: white;">
        <tr>
        <th>Client's Name</th>
							<th>House</th>
							<th>Day</th>
							<th>Time</th>
							<th>Hours</th>
							<th>End</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
  			</thead>
  			<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` WHERE `status` = 'Approved' ORDER BY firstName") or die(mysqli_query());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
							<td><?php echo $fetch['name']?></td>
							<td><?php echo "<label style = 'color: grey;'>".date("d M, Y")."</label>"?></td>
							<td><?php echo $fetch['timeStart']?></td>
							<td><?php echo $fetch['hours']?></td>
							<td><?php echo $fetch['timeEnd']?></td>
							<td><?php echo $fetch['status']?></td>
              <td><a class = "btn btn-success" href = "Buy-Process.php?reservation_id=<?php echo $fetch['reservation_id']?>">
              <i class='bx bx-check'></i></a>
              <a class = "btn btn-danger" 
							href = "Pending-Delete.php?reservation_id=<?php echo $fetch['reservation_id']?>"><i class='bx bx-x'></i> </a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
      </table>
  
  </div>
  <div class="tab-pane fade" id="pills-bought" role="tabpanel" aria-labelledby="pills-bought-tab">
  <table class="table">
      <thead class="table" style="background-color: #243e56; color: white;">
      <tr>
							<th>Buyer's Name</th>
							<th>House</th>
							<th>City</th>
							<th>Street</th>
							<th>Post Code</th>
							<th>Price</th>
              <th>Bill</th>
              <th>Payed</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` WHERE `status` = 'Bought' ORDER BY firstName") or die(mysqli_query());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
              <td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>

							<td><?php echo $fetch['name']?></td>
							<td><?php echo $fetch['city']?></td>
							<td><?php echo $fetch['street']?></td>
							<td><?php echo $fetch['postCode']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><?php echo $fetch['bill']?></td>
              <td>Yes</td>
              <?php 
              // echo "DKK ".$fetch['price'].".00"
              ?> 
						</tr>
						<?php
							}
						?>
					</tbody>
      </thead>
      </table>
  
  </div>
</div>
</div>
</body>
</html>
<script src="../assets/js/main.js"></script>