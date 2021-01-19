<?php
require './Name.php';
require './Admin-Validation.php';

if(ISSET($_POST['add_house'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $postCode = $_POST['postCode'];
    $price = $_POST['price'];
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $photo_name = addslashes($_FILES['photo']['name']);
    $photo_size = getimagesize($_FILES['photo']['tmp_name']);
    move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/properties/" . $_FILES['photo']['name']);
    $conn->query("INSERT INTO `houses` ( name, description, city, street, postCode, price, photo) VALUES
    ('$name','$description','$city','$street', '$postCode','$price', '$photo_name')") or die(mysqli_error());
    header("location: Houses.php");
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
    <h2 class="houses-title" >Houses</h2>
    
<div class="row mt-5">
  <div class="col-6">

  <button class = "btn-add"><a data-bs-toggle="modal" data-bs-target="#houseModal"> Add New</a></button>

<div class="modal fade" id="houseModal" tabindex="-1" aria-labelledby="houseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method = "POST">
        
      <div class="row">
          <div class="col-6">
          <div class = "form-group">
							<label>House Name</label>
							<input type = "text" class = "form-control" name = "name" />
						</div>
          </div>
          <div class="col-6">
          <div class = "form-group">
							<label>City</label>
							<input type = "text" class = "form-control" name = "city" />
           </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
          <div class = "form-group">
							<label>Street</label>
							<input type = "text" class = "form-control" name = "street" />
            </div>
          </div>
          <div class="col-6">
          <div class = "form-group">
							<label>Post Code </label>
							<input type = "text" class = "form-control" name = "postCode" />
          </div>
          </div>
        </div>
        <div class = "form-group">
							<label>Price</label>
							<input type = "text" class = "form-control" name = "price" />
        </div>


				<div class = "form-group">
							<label>Description</label>
							<textarea type = "textarea" class = "form-control" name = "description"></textarea>
        </div>

        <div class = "form-group">
							<label>Photo </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<div id = "lbl">[Photo]</div>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</div>
						<br />
            <div class = "form-group mt-3">
			<button name = "add_house" class = "form-control add-house">ADD HOUSE</button>
</div>
		</form>
      </div>
    </div>
  </div>
</div>
  </div>
  <div class="col-6">
  <?php require '../components/Pagination.php';?>

<div class="d-flex flex-row-reverse bd-highlight">
            <form action="Houses.php" method="post">
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
    

<div class="row mt-3">
<?php foreach ($houses as $house) : ?>
  <div class="col-sm-6 mt-3">
    <div class="card shadow">
      <div class="row">
        <div class="col-sm-6">
  
      <img src = "../assets/properties/<?php echo $house['photo']?>" height = "250" width = "300"/>
        </div>

      <div class="col-sm-6">
        <h3 class="card-title mt-3"><?php echo $house['name']?></h3>
        <h6 class="card-subtitle mt-2"><?php echo $house['city']." - ".$house['street']?></h6>
    
      </div>

    </div>

    <a href = "./House-Detail.php?house_id=<?php echo $house['house_id']?>" class="stretched-link"></a>
  </div>
  </div>

  <?php endforeach; ?>
<!-- 
  <div class="col-sm-6">
    <div class="card">
      <div class="row">

        <div class="col-sm-6">
      <img src = "../assets/images/" height = "200" width = "250"/>
        </div>

      <div class="col-sm-6">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>

    </div>
  </div>
  </div> -->
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
                    href="Houses.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                    <a class="page-link" style="background-color: #243e56; color: white;"
                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>


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
    <a href='../server/Logout.php'>Logout</a>
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
<script src="../assets/js/main.js"></script>

