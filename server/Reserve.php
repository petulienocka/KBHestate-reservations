<?php
session_start();
$host = "localhost";
$dbUsername = "root";
$dbPassword = "WebDev19";
$dbname = "KBHestate";
//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$conn->autocommit(false);
$house_id = $conn->query('SELECT house_id FROM houses WHERE house_id=1');
$email = $_SESSION['email'];
$client_id = $conn->query("SELECT client_id FROM clients WHERE email LIKE '$email%'");
while ($row = $client_id->fetch_assoc()) {
    $client_id = $row['client_id'];
}
while ($row2 = $house_id->fetch_assoc()) {
    $house_id = $row2['house_id'];
}
echo 'you have now booked the offer';
$conn->query("INSERT INTO reservations (client_id, house_id) VALUES ($client_id,  $house_id)");
$conn->commit();
 