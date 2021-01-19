<?php
require './server/PDO.php';
session_start();
if(!ISSET($_SESSION['client'])){
  header("location:index.php");
}

?>

<html lang="en">
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

    

<link rel="stylesheet" href="../assets/style/main.css">
    <link rel="stylesheet" href="../assets/style/animations.css">

    <title>Client Profile</title>
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
<?php require './components/Client-sidebar.php'; ?>
<div class="container">

<div class="row">
<div class="col-6 mt-5">
<h2 class="houses-title" >Houses</h2>
</div>
<div class="col-6 mt-5">
<?php require './components/Pagination.php';?>

<div class="d-flex flex-row-reverse bd-highlight">
            <form action="Offers.php" method="post">
                <select name="houses-limit" id="houses-limit" class="custom-select">
                    <option disabled selected>Houses per page</option>
                    <?php foreach([2,4,6,8,10] as $limit) : ?>
                    <option
                        <?php if(isset($_SESSION['houses-limit']) && $_SESSION['houses-limit'] == $limit) echo 'selected'; ?>
                        value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
</div>
</div>

<div class="row mt-5">
<?php foreach ($houses as $house) : ?>
<div class="col-6 mt-5">
<div class="card shadow">
      <div class="row">
        <div class="col-sm-6">
  
      <img src = "./assets/properties/<?php echo $house['photo']?>" height = "250" width = "300"/>
        </div>

      <div class="col-sm-6">
        <h3 class="card-title mt-3"><?php echo $house['name']?></h3>
        <h6 class="card-subtitle mt-2"><?php echo $house['city']." - ".$house['street']?></h6>
        <h6 class="mt-3"><?php echo $house['price']?>$</h6>
        <div class="reserve mt-5">
        <a class = "reserve-btn" href = "./Reserve.php?house_id=<?php echo $house['house_id']?>">Visit</a>
        
        
        <!-- <a data-bs-toggle="modal" data-bs-target="#reserveModal" 
        class = "reserve-btn"> Reserve</a>

        <div class="modal fade" id="reserveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reserveModalLabel">Reserve Your Visit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <select class="form-select" aria-label="Default select example">



    <option selected>Agent</option>
    <?php  
        $query = $conn->query("SELECT * FROM `agents`") or die(mysqli_error());
        while($fetch = $query->fetch_array()) {
            echo "<option>" . $fetch['firstName'] . " " .$fetch['lastName'] . "</option>";
        }
    ?>
</select>
<div class = "form-group">
							<label>Date</label>
							<input type = "date" class = "form-control" name = "date"  />
			</div>
      <div class = "form-group">
							<label>Time</label>
							<input type = "time" class = "form-control" name = "time"  />
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Reserve</button>
      </div>
    </div>
  </div>
</div> -->


        </div>

      </div>
      
    </div>
  </div>
  </div>

  <?php endforeach; ?>

</div>
<div class="col-6"></div>
</div>


<nav class="mt-5" aria-label="pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link" style="background-color: #243e56; color: white;"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" style="background-color: #f5f5f5; color: #243e56; border: none;"
                    href="Offers.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                    <a class="page-link" style="background-color: #243e56; color: white;"
                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>

</div>

 
</body>
<script>
$(document).ready(function () {
  $('#houses-limit').change(function () {
      $('form').submit();
  })
});
</script>
</html>
<script src="./assets/js/main.js"></script>