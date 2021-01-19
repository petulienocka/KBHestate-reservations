<?php
require './Name.php';
require './Admin-Validation.php';

if(ISSET($_POST['add_form'])){
    $hours = $_POST['hours'];
    $query = $conn->query("SELECT * FROM `reservations` WHERE  `status` = 'Approved'") or die(mysqli_error());
    $row = $query->num_rows;
    if($row > 0){
        echo "<script>alert('Room not available')</script>";
    }else{
        $query2 = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
        $fetch2 = $query2->fetch_array();
        $total = $fetch2['price'];
        $timeEnd = time("H:i:s", strtotime($fetch['timeStart']."+".$hours."HOURS"));
        $conn->query("UPDATE `reservations` SET  `hours` = '$hours', `status` = 'Approved', `timeStart` = '$timeStart', `timeEnd` = '$timeEnd' WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
		header("location:Dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- JQuery Links -->
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>


<!-- Bootstrap Links -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<!-- Icons Links -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/6e0e6df0b8.js" crossorigin="anonymous"></script>

 <!-- Animation Links -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

 <!-- Style Links -->
<link rel="stylesheet" href="../assets/style/main.css">
<link rel="stylesheet" href="../assets/style/animations.css">
<title>Admin Dashboard</title>
</head>
<body>
	<div class="container-confirmation text-center mt-5">
	<h2 style="color: #243e56;">Process the information for approval</h2>
		<div class="form justify-content-center mt-5">
				<?php
					$query = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<form method = "POST" enctype = "multipart/form-data" action = "Confirmation-Process.php?reservation_id=<?php echo $fetch['reservation_id']?>">
					<div class = "form-inline" style = "float:left;">
						<label>Firstname</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['firstName']?>" class = "form-control" size = "40" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Lastname</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['lastName']?>" class = "form-control" size = "40" disabled = "disabled"/>
					</div>
					<br style = "clear:both;"/>
					<br />
					<div class = "form-inline" style = "float:left;">
						<label>City</label>
						<br />
						<input type = "text" value = "<?php echo $fetch['city']?>" class = "form-control" size = "20" disabled = "disabled"/>
					</div>
					<div class = "form-inline" style = "float:left; margin-left:20px;">
						<label>Hours</label>
						<br />
						<input type = "number" min = "0" max = "99" name = "hours" class = "form-control" required = "required"/>
					</div>
					<br style = "clear:both;"/>
					<br />
					<button name = "add_form" class = "submit-button"> SUBMIT</button>
				</form>
			</div>
			</div>
			</div>
</body>
</html>