
<?php 
$conn = mysqli_connect("localhost","root","WebDev19","KBHestate");
 
if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>