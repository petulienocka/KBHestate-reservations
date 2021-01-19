<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agents</title>
    <?php require '../components/Links.php'; ?>
</head>
<body>
<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone Number</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $conn->query("SELECT * FROM `agents`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstName']?></td>
							<td><?php echo $fetch['lastName']?></td>
              <td><?php echo $fetch['email']?></td>
							<td><?php echo $fetch['phone']?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
</body>
</html>