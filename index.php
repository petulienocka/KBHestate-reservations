<?php
require_once './components/LanguageSwitcher.php';
require './admin/Connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
<!-- JQuery Links -->
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>


<!-- Bootstrap Links -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<!-- Icons Links -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/6e0e6df0b8.js" crossorigin="anonymous"></script>

 <!-- Animation Links -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

 <!-- Style Links -->
<link rel="stylesheet" href="./assets/style/main.css">
<link rel="stylesheet" href="./assets/style/animations.css">


    <title>KBH Real Estate</title>
</head>
<body>
<section class="top-section" id="top-section">

<?php
    include './components/Header.php';
?>

<div class="text-center" style="margin-top: 15%;">
        <h1 class="title"><?=$lang['index-title'] ?></h1>
        <h3 class="subtitle"><?=$lang['index-subtitle'] ?></h3>
      
        <a href="#destinations" class="arrow-down nav-link scroll-link" ><i class="fas fa-angle-down" style="margin-top: 15%; font-size: 70px; color: white; opacity: 80%"></i></a>
        
</div>
<br>
</section>

<!-- SEARCH SECTION -->

<section class="search-container section-container ">
    <div class="container shadow" data-aos="fade-up"
     data-aos-anchor-placement="bottom-center" data-aos-duration="2000">
<form class="row g-3 justify-content-center" action="" method="post">

  <div class="col-auto mt-5"  data-aos="zoom-out-up" data-aos-duration="2000">
  
  <select name="" class="form-select" aria-label="Default select example">
  <option selected disabled>Region</option>
  <option value="1">Sjælland</option>
  <option value="2">Jylland</option>
  <option value="3">Fyn</option>
  <option value="4">Færoerne</option>
</select>
</div>


<div class="col-auto mt-5"  data-aos="zoom-out-up" data-aos-duration="2000">
  
<select name="city" class="form-select" aria-label="Default select example ">
  <option selected disabled>City</option>
  <?php  
	$query = $conn->query("SELECT * FROM `houses`") or die(mysqli_error());
	while($fetch = $query->fetch_array()){
	?>
  <option name="city" value=""><?php echo $fetch['city']?></option>
  <?php
	}
	?>
</select>
</div>

<div class="col-auto mt-5"  data-aos="zoom-out-up" data-aos-duration="2000">
<select name="price" class="form-select" aria-label="Default select example">
  <option selected disabled>Price</option>
  <option value="0">0-100 000 DKK</option>
  <option value="100">100 000 - 350 000 DKK</option>
  <option value="350">350 000 - 500 000 DKK</option>
</select>
</div>

  <div class="col-auto mt-5">
    <button class="btn btn-primary" style=" outline: none; border: none"><i class='bx bx-search-alt-2'><a href="./Search.php"></a></i></button>
  </div>
</form>
</div>
</section>


<!-- DESTINATIONS SECTION -->
<section class="destinations-container section-container mb-5" id="destinations">
    <h2 class="text-center mt-5" style="color: #70AA62;" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">POPULAR<span style="color: black;"> DESTINATIONS</span><h2>
    <div class="row justify-content-center mt-5" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
        <div class="col-3 text-center">
        <p><a onclick="changeImage('./assets/images/bg.jpg');" style="cursor: pointer;" default>Copenhagen</a></p>
            <hr/>
        </div>
        <div class="col-3 text-center">
        <p><a  onclick="changeImage('./assets/images/house.jpg');" style="cursor: pointer;">Odense</a></p>
        <hr/>
        </div>
        <div class="col-3 text-center">
        <p>Aarhus</p>
        <hr/>
        </div>
</div>

<div class="row justify-content-center mt-5" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom" data-aos-duration="3000">
        <div class="col-3 text-center">
            <p>Svendborg</p>
            <hr/>
        </div>
        <div class="col-3 text-center">
        <p>Aalborg</p>
        <hr/>
        </div>
        <div class="col-3 text-center">
        <p>Søneborg</p>
        <hr/>
        </div>
</div>

<div class="row justify-content-center mt-5" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom" data-aos-duration="3000">
        <div class="col-3 text-center">
            <p>Kolding</p>
            <hr/>
        </div>
        <div class="col-3 text-center">
        <p>Esbejrg</p>
        <hr/>
        </div>
        <div class="col-3 text-center">
        <p>Randers</p>
        <hr/>
        </div>
</div>
</section>

<!-- BOOK SECTION -->
<section class="book-section bg-dark" id="book">
            <div class="container-3">
            <div class="section-heading text-center pt-5" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">
            <h2 class="text-center mt-2" style="color: white;">NEW<span class="ml-3" style="color: #70AA62;">OFFER</span><h2>
        <!-- <p style="color: white">If you want to use our service of quick booking, please register your account and login first.</p> -->
      </div>
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0 mt-5">
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-duration="2000"><img class="img-fluid shadow-lg" src="assets/images/bg.jpg" id="imageReplace" alt="" /></div>
                    <div class="col-lg-4">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left" data-aos="fade-left" data-aos-duration="2000">
                                    <h4 class="text-white">Lorem ipsum dolor</h4>
                                    <p class="mb-0 text-white-50">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <hr class="d-none d-lg-block mb-0 ml-0"  style="color: green;"/>
                                    <?php  if (isset($_SESSION['client'])) : ?> 
                                    <button class="book-button mt-5">VISIT</button>
                                    <?php  elseif (!isset($_SESSION['client'])) : ?> 
                                    <button class="book-button mt-5" onclick="alertActive()">VISIT</button>
                                    <?php endif ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center no-gutters pb-5">
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-duration="2000"><img class="img-fluid shadow-lg" src="assets/images/plan.png" alt="" /></div>
                    <div class="col-lg-4 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right" data-aos="fade-right" data-aos-duration="2000">
                                    <h4 class="text-white">Sed ut perspiciatis</h4>
                                    <p class="mb-0 text-white-50">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <hr class="d-none d-lg-block mb-0 ml-0"  style="color: green;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

 <!-- REVIEWS SECTION -->

<section class="section-reviews">
  <div class="title-wrap d-flex justify-content-center" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">
              <div class="text-center mt-5">
            <h5 style="color: white;">Customer Reviews<h5>
              <h1 class="mt-5">Happy Clients.</h1>
              </div>
            </div>
  
  <div class="row justify-content-center mt-5">
  <div class="card text-center ml-5" data-aos="zoom-out-down" data-aos-duration="1500">
  <div class="card-header" >
  <img src="./assets/images/image-review.jpg" alt="" style="width: 90px; height: 80px; border-radius: 100px;">
</div>
  <div class="card-body">
    <h5 class="card-title mt-2" style="color: #70AA62;"><strong>The best real estate</strong></h5>
    <figcaption class="blockquote-footer mt-2">
    Mark Larsen
  </figcaption>
    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
    <br>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bx-star' style="color: orange;"></i>
    <i class='bx bx-star' style="color: orange;"></i>
  </div>
  </div>
  <br>
  <div class="card ml-5 text-center" data-aos="zoom-out-down" data-aos-duration="1500">
  <div class="card-header">
  <img src="./assets/images/image-review.jpg" alt="" style="width: 90px; height: 80px; border-radius: 100px;">
</div>
  <div class="card-body">
    <h5 class="card-title mt-2" style="color: #70AA62;"><strong>Thank you for new home</strong></h5>
    <figcaption class="blockquote-footer mt-2">
    Alice Fink
  </figcaption>
    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
    <br>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
  </div>
  </div>
  <br>
  <div class="card text-center ml-5"  data-aos="zoom-out-down" data-aos-duration="1500">
  <div class="card-header">
  <img src="./assets/images/image-review.jpg" alt="" style="width: 90px; height: 80px; border-radius: 100px;">
</div>
  <div class="card-body">
    <h5 class="card-title mt-2" style="color: #70AA62;"><strong>Great house offers</strong></h5>
    <figcaption class="blockquote-footer mt-2">
    Maria Madhru
  </figcaption>
    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
    <br>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bxs-star' style="color: orange;"></i>
    <i class='bx bx-star' style="color: orange;"></i>
  </div>
  </div>
</div>
</section>


 <!-- FACTS SECTION -->
<section class="facts-section mb-5 mt-5">
<div class="container-4">
  <div class="row">
    <div class="col-md-4" >
    <div class="count-box">
    <i class="fa fa-users"></i>
    </div>
    <br>
    <h1 ><span class="counter">2,523</span></h1>
    <h5>Satisfied Customers</h5>
    </div> 
    <div class="col-md-4">
    <div class="count-box">
    <i class="fas fa-home"></i>
    </div>
    <br>
      <h1><span class="counter">63,075</span></h1>
      <h5>Sold Houses</h5>
    </div>
    <div class="col-md-4">
    <div class="count-box">
    <i class="fas fa-globe-americas"></i>
    </div>
    <br>
      <h1><span class="counter">320</span></h1>
      <h5>Agents</h5>
    </div>
  </div>
</div>
</section>




<!-- TEAM SECTION -->

<section class="section-team">
      <div class="container-2">
        <div class="row">  
            <div class="title-wrap d-flex justify-content-center mt-5" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="2000">
              <div class="text-center">
            <h2  style="color: white;">THE BEST<span class="ml-3" style="color: #70AA62;">AGENTS</span><h2>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="card-box-d" data-aos="flip-left"  data-aos-duration="1500">
              <div class="card-img-d">
                <img src="assets/images/portrait-1.jpg" alt="" class="img-d img-fluid mb-5" style="height: 100%">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="team-link">Mark Twain</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234</p>
                    <p>
                      <strong>Email: </strong> agents@example.com</p>
                      <button class="team-button mt-5">CONTACT</button>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="card-box-d" data-aos="flip-left"  data-aos-duration="1500">
              <div class="card-img-d">
                <img src="assets/images/portrait-2.jpg" alt="" class="img-d img-fluid" style="height: 100%">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="team-link">Stiven Spilver
                        <br> Darw</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234</p>
                    <p>
                      <strong>Email: </strong> agents@example.com</p>
                      <button class="mt-5">CONTACT</button>
                  </div>
                  
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="card-box-d" data-aos="flip-left"  data-aos-duration="1500">
              <div class="card-img-d">
                <img src="assets/images/portrait-3.jpg" alt="" class="img-d img-fluid" style="height: 100%">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.html" class="team-link">Emma Toledo
                        <br> Cascada</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  <p class="content-d color-text-a">
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>
                  <div class="info-agents color-a">
                    <p>
                      <strong>Phone: </strong> +54 356 945234</p>
                    <p>
                      <strong>Email: </strong> agents@example.com</p>
                      <button class="mt-5">CONTACT</button>
                  </div>
                </div>
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="contact-container section-container mt-5 text-center">
    <h2 class="text-center mt-5" style="color: #70AA62;" class="row justify-content-center mt-3" data-aos="fade-up"
     data-aos-duration="2000">CONTACT<span class="ml-2" style="color: black;">US</span><h2>
<?php
    include './components/Contact.php';
?>
</div>

<div class="footer-container section-container mt-5">
<?php
    include './components/Footer.php';
?>
</div>

</body>
</html>
<!-- JavaScript Links -->
<script src='./assets/js/main.js'></script>
<script>
function alertActive() {
  alert("You need to login first!");
}
</script>

<style>

    
.img-fluid {
    height: 400px;
    width: 800px;
}


.container {
    margin-top: 0%;
    background-color: rgb(50, 57, 65);
    height: 150px;
}

h1 {
        font-family: Roboto regular;
        font-weight: light;
        color: white;
        font-size: 65px;
    }
    h3 {
        font-family: Roboto light;
        color: white;
        font-size: 30px;
    }
</style>