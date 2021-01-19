<?php
require './client/Client-Validation.php';
require './admin/Connection.php';


    $date = $_POST['date'];
    $timeStart = $_POST['timeStart'];

	if(!($queryResult = mysql_query("INSERT INTO test (date, timeStart) VALUES ($date,'$timeStart')"))){
		echo "CALL failed: " .  mysql_error();
	  }
	  else{
          echo "echo";
	  }


// if(isset($_POST['make_reservation']))
// {
//     try {

//         $pdoConnect = new PDO("mysql:host=localhost;dbname=KBHestate","root","WebDev19");
//     } catch (PDOException $exc) {
//         echo $exc->getMessage();
//         exit();
//     }

   
//     $date = $_POST['date'];
//     $timeStart = $_POST['timeStart'];
//     $agent_id = $_POST['agent_id'];
//     $client_id = $_POST['client_id'];
    

//     $pdoQuery = "INSERT INTO `reservations`(`date`, `timeStart`) VALUES (:date, :timeStart)";
    
//     $pdoResult = $pdoConnect->prepare($pdoQuery);
    
//     $pdoExec = $pdoResult->execute(array(":date"=>$date,":timeStart"=>$timeStart));
    
//     if($pdoExec)
//     {
//         header("./Offers.php");
//     }else{
//         echo 'Data Not Inserted';
//     }
// }

?>
