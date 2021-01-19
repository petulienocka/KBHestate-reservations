<?php
require '../server/PDO.php';
require './Name.php';
require './Admin-Validation.php';

	  $pdo = pdo_connect_mysql();
	  $msg = '';
	  if (isset($_GET['house_id'])) {
		  $stmt = $pdo->prepare('SELECT * FROM houses WHERE house_id = ?');
		  $stmt->execute([$_GET['house_id']]);
		  $house = $stmt->fetch(PDO::FETCH_ASSOC);
		  if (!$house) {
			  die ('house doesn\'t exist with that ID!');
		  }
		 
		  
	  } else {
		  die ('No ID specified!');
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

    <title>Admin Dashboard</title>
</head>

<body>

<div class="container-fluid">
  
<?php  require '../components/Admin-sidebar.php'; ?>
  
<div class="row">
    
    <div class="col-sm-9 mt-5" style="padding-left: 300px;">
    <h2 class="houses-title" ><?php echo $house['name']?></h2>
    <h6 class="card-subtitle mt-2"><?php echo $house['city']?></h6>
    <a href="./Houses.php"><i class='bx bx-left-arrow-alt mt-3'></i></a>
    <div class="stars" style="float: right;">
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bx-star' style="color: orange;"></i>
    <i class='bx bx-star' style="color: orange;"></i>
    </div>

    <div class="row mt-3">
        <div class="col-6">
        <img class="img-fluid" src = "../assets/properties/<?php echo $house['photo']?>" style="width: 800px;" />
        <div class="row">
            <div class="col-6">
            <div class="property-price d-flex mt-5">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">$</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $house['price']?></h5>
                    </div>
                  </div>
                </div>
                <div class="agent-buttons mt-5 ">
                <a href="Edit-House.php?house_id=<?=$house['house_id']?>" class="edit-house">EDIT</a>
                <a href="Delete-House.php?house_id=<?=$house['house_id']?>" class="sold-house">SOLD</a>
             
                </div>
            </div>
            <div class="col-6">
            <div class="summary mt-5" >
        <h4 class="mt-2"><strong class="summary-text">Street: </strong><?php echo $house['street']?></h4>
        <h4 class="mt-2"><strong class="summary-text">Post Code: </strong><?php echo $house['postCode']?></h4>
        </div>
            </div>
        </div>
       

        </div>
        
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                <img class="img-fluid" src = "../assets/images/help1.jpg" />
                </div>
                <div class="col-6">
                <img class="img-fluid" src = "../assets/images/help2.jpg" />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                <img class="img-fluid" src = "../assets/images/help3.jpg" />
                </div>
                <div class="col-6">
                <img class="img-fluid" src = "../assets/images/Plan.png" />
                </div>
            </div>
            <div class="description mt-5">
            <p class="card-subtitle mt-2"><?php echo $house['description']?></p>
            </div>
            
        </div>
    </div>
    



</div>        
    
    
    <div class="col-3">

  <div id="agent-info" >
  <div class="right-side-bar shadow position-fixed" style="background-color: #f5f5f5; width: 500px;">
  <div class="main-info text-center" id="main-info">
  <h3 class="text-center mt-5" style="padding-top: 50px;">AGENT</h3>
  <img class="mt-5 side-img" src="../assets/images/image-review.jpg" alt="agent-photo" width="200px;" style="">
    <p class="mt-5"><strong>Kathrine Whoknows</strong> </p>
    <hr>
  </div>
    <div class="credentials float-start mt-5 ml-3">
    <p><strong>Email:</strong> <?php echo  $_SESSION['agent'] ?></p>
    <p><strong>Phone:</strong> 44678900</p>
    </div>
    <div class="footer text-center" style="padding-top: 300px;">
    <a href='../server/Logout.php'>Logout</a>
    <br>
    <span><i class='bx bxs-cog mt-5 mb-5'></i>Edit</span>
    </div>
  </div>
  </div>
  </div>
  </div> 
  </div>

</div>

 
</body>

</html>
<script src="../assets/js/main.js"></script>

