<?php
session_start();
require "./server/Login-Process.php";
require "./server/Register-Process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>

<link rel="stylesheet" href="./assets/style/main.css">
    
    <title>Navbar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-none clearfix">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-brand ml-5" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
    <img width="200" class="d-inline-block align-top" src="assets/images/Logo.png" >
    </div>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="ml-5"><a href="#" ></a></li>
        <li class="ml-5"><a href=# ></a></li>
      </ul>

<!-- DROPDOWNS -->

  <div class="btn-group mr-5 mt-3" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
  <button class=" btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="background: transparent; border: none; outline: none;">
  <?=$lang['index-language'];?>
  </button>
  <ul class="dropdown-menu">

<li><a class="dropdown-item" href="index.php?la=en"><img class="ml-3" src="assets/images/flag_uk.png" alt="<?=$lang['lang-en'];?>" title="<?=$lang['lang-en'];?>" style="width: 25px;"/><span class="ml-3"><?=$lang['lang-en'];?></span></a></li>
<li><a class="dropdown-item" href="index.php?la=dk"><img class="ml-3" src="assets/images/flag_dk.png" alt="<?=$lang['lang-dk'];?>" title="<?=$lang['lang-dk'];?>" style="width: 25px;"/><span class="ml-3"><?=$lang['lang-dk'];?></span></a></li>
</ul>
</div>


 <div class="dropdown mr-5 mt-3" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
  <a class="btn btn-secondary ml-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
  <i class='bx bx-menu'></i>
  <i class='bx bxs-user-circle'></i>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php if ( !$_SESSION['client'] ) : ?>
  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>
  <?php endif; ?>
  <?php  if (isset($_SESSION['client'])) : ?> 
  <li><a class="dropdown-item" href="Profile.php" >Profile</a></li>
  <?php endif ?> 

    <hr/>
    <li><a class="dropdown-item" href="#">Help</a></li>
  </ul>
</div>
    </div>
  </div>
</nav>

<!-- Login Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal-label" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-center" id="loginLabel"><a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" style="color: #70AA62;">Register Here</a></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php require './Login.php'; ?>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModal-label" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-center" id="registerLabel"><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" style="color: #70AA62;">Login Here</a></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php require './Register.php'; ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script>
  AOS.init();
</script>


