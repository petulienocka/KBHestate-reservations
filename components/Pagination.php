<?php 

$hostname = "localhost";
$username = "root";
$dbname = "KBHestate";
$password = "WebDev19";

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
  
  session_start();
  if(isset($_POST['houses-limit'])){
      $_SESSION['houses-limit'] = $_POST['houses-limit'];
  }
  
  $limit = isset($_SESSION['houses-limit']) ? $_SESSION['houses-limit'] : 6;
  $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
  $paginationStart = ($page - 1) * $limit;
  $houses = $connection->query("SELECT * FROM houses LIMIT $paginationStart, $limit")->fetchAll();

  $sql = $connection->query("SELECT count(house_id) AS house_id FROM houses")->fetchAll();
  $allRecrods = $sql[0]['house_id'];
  
  $totoalPages = ceil($allRecrods / $limit);

  $prev = $page - 1;
  $next = $page + 1;
?>

