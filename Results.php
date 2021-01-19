
<?php
require './admin/Connection.php';

if(isset($_POST['search']))
{
    $city = $_POST['city'];
    $query = "SELECT * FROM `houses` WHERE `city` LIKE '$city%'";
    $search_result = filterTable($query);

} else {
  $query = "SELECT * FROM `houses`";
  $search_result = filterTable($query);
}

function filterTable($query)
{
  $connect = mysqli_connect("localhost", "root", "WebDev19","KBHestate");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
}    
   
?>
<html>
<head>
<!-- <meta http-equiv="refresh" content="600; url=../server/Logout.php" /> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
   
   
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />

    

<link rel="stylesheet" href="./assets/style/main.css">
    <link rel="stylesheet" href="./assets/style/animations.css">

    <title>Search Results</title>
</head>
<style>
.reserve-btn {
  border: 2px solid #243e56;
  background-color: transparent;
  color: #243e56;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<body>
<div class="container">
<div class="row mt-5">
<?php while($row = mysqli_fetch_array($search_result)):?>
<div class="col-6 mt-5">
<div class="card shadow">
      <div class="row">
        <div class="col-sm-6">
  
      <img src = "./assets/properties/<?php echo $row['photo']?>" height = "250" width = "300"/>
        </div>

      <div class="col-sm-6">
        <h3 class="card-title mt-3"><?php echo $row['name']?></h3>
        <h6 class="card-subtitle mt-2"><?php echo $row['city']." - ".$row['street']?></h6>
        <h6 class="mt-3"><?php echo $row['price']?>$</h6>
        <div class="reserve mt-5">
        <a href = "Reserve.php?house_id=<?php echo $row['house_id']?>" 
        class = "reserve-btn"> Reserve</a>
        </div>

      </div>
      
    </div>
  </div>
</div>
        <?php endwhile;?>
</div>
</div>
</body>
</html>


