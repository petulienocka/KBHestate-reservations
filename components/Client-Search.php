<?php

$connect = mysqli_connect("localhost", "root", "WebDev19", "KBHestate");
$agents = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT * FROM agents WHERE firstName LIKE '%".$search."%'OR lastName LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phone LIKE '%".$search."%' 
	";
}
else
{
	$query = "SELECT * FROM agents ORDER BY client_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$agents .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Customer Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Postal Code</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$agents .= '
			<tr>
				<td>'.$row["firstName"].'</td>
				<td>'.$row["lastName"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["phone"].'</td>
			</tr>
		';
	}
	echo $agents;
}


?>