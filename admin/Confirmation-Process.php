<?php
require './Connection.php';

if(ISSET($_POST['add_form'])){
    $hours = $_POST['hours'];
    $query = $conn->query("SELECT * FROM `reservations` WHERE  `status` = 'Approved'") or die(mysqli_error());
    $row = $query->num_rows;

        $query2 = $conn->query("SELECT * FROM `reservations` NATURAL JOIN `clients` NATURAL JOIN `houses` 
        WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
        $fetch2 = $query2->fetch_array();
        $total = $fetch2['price'];
        $timeEnd = time("H:i:s", strtotime($fetch['timeStart']."+".$hours."HOURS"));
        $conn->query("UPDATE `reservations` SET  `hours` = '$hours', `status` = 'Approved', `timeStart` = '$timeStart', 
        `timeEnd` = '$timeEnd' WHERE `reservation_id` = '$_REQUEST[reservation_id]'") or die(mysqli_error());
        alert("location: Dashboard.php");
    
}

?>