<?php
require './Name.php';
require './Admin-Validation.php';



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
    <h2 class="houses-title" >Dashboard</h2>
    <p><?=$lang['dashboard-pendings'] ?></p>

 <?php require '../components/Graphs.php'; ?>


 <div class="reservations" id="reservations">
<?php require '../components/Admin-navtab.php'; ?>    
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
    <div class="footer text-center" style="padding-top: 250px;">
    <a style="color: #243e56;" href='../server/Logout.php'>Logout</a>
    <br>
    <span><i class='bx bxs-cog mt-5 mb-5 mr-2' style="color: #243e56; font-size: 20px;"></i>Edit</span>
    </div>
    <div class="language-switcher text-center mb-5">
    <a href="Dashboard.php?la=en"><img class="ml-3" src="../assets/images/flag_uk.png" alt="<?=$lang['lang-en'];?>" title="<?=$lang['lang-en'];?>" style="width: 35px;"/><span class="ml-3"><?=$lang['lang-en'];?></span></a>
<a href="Dashboard.php?la=dk"><img class="ml-3" src="../assets/images/flag_dk.png" alt="<?=$lang['lang-dk'];?>" title="<?=$lang['lang-dk'];?>" style="width: 35px;"/><span class="ml-3"><?=$lang['lang-dk'];?></span></a>
    </div>
  </div>
  </div>
  </div>
  </div> 
  </div>

</div>

 
</body>
<script>
       $(".quick_look").on("click", function() {
          var dataURL = $(this).attr( "data-href" );
        
        $('.modal-body').load(dataURL, function(){ $('#clientModal').modal({show:true}); 
        });


       });
</script>
</html>
<script src="../assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>