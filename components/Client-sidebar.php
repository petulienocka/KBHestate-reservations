<?php

session_start();

if (!isset($_SESSION['client'])) {
	header('Location: index.php');
	exit();
}

require './admin/Connection.php';


// $query = $conn->query("SELECT * FROM `clients` WHERE `client_id` = '$email'") or die(mysqli_error());
// 	$fetch = $query->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
*, *::before, *::after {
  box-sizing: border-box;
}


em {
  color: #f5f5f5;
}

i {
  color: #f5f5f5;

}



/* Sidebar */
.sidebar-trigger {
  z-index: 2;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 4em;
  background: #192b3c;
}

.sidebar-trigger > i {
  display: inline-block;
  margin: 1.5em 0 0 1.5em;
  color: #f07ab0;
}

.navigation {
  position: fixed;
  top: 0;
  left: -15em;
  overflow: hidden;
  transition: all .3s ease-in;
  width: 15em;
  height: 100%;
  background: #70AA62;
  color: rgba(255, 255, 255, 0.7);
}

.navigation:hover,
.navigation:focus,
.sidebar-trigger:focus + .navigation,
.sidebar-trigger:hover + .navigation {
  left: 0;
}

.navigation ul {
  position: absolute;
  top: 4em;
  left: 0;
  margin: 0;
  padding: 0;
  width: 15em;
}

.navigation ul li {
  width: 100%;
}

.navigation-link {
  position: relative;
  display: inline-block;
  width: 100%;
  height: 4em;
}

.navigation-link em {
  position: absolute;
  top: 50%;
  left: 4em;
  transform: translateY(-50%);
}

.navigation-link:hover {
  background: #4d6276;
}

.navigation-link > i {
  position: absolute;
  top: 0;
  left: 0;
  display: inline-block;
  width: 4em;
  height: 4em;
}

.navigation-link > i::before {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Mobile First */
@media (min-width: 42em) {
  .s-layout__content {
     margin-left: 4em;
  }
  
  /* Sidebar */
  .sidebar-trigger {
     width: 4em;
  }
  
  .navigation {
     width: 4em;
     left: 0;
  }
  
  .navigation:hover,
  .navigation:focus,
  .sidebar-trigger:hover + .navigation,
  .sidebar-trigger:focus + .navigation {
     width: 15em;
  }
}

@media (min-width: 68em) {
  .s-layout__content {
     margin-left: 15em;
  }
  
  /* Sidebar */
  .sidebar-trigger {
     display: none
  }
  
  .navigation {
     width: 15em;
  }
  
  .navigation ul {
     top: 1.3em;
  }
}


</style>
</head>
<body>
<div class="sidebar">
  <a class="sidebar-trigger" href="#0">
     <i class="bx bx-menu"></i>
  </a>

  <nav class="navigation ">
  <div class="navbar-brand mt-5 text-center" data-aos="fade-down">
  <img src="./assets/images/Logo.png" alt="logo" width="200px;">
  </div>
     <ul class="mt-5">
       <div id="side-links"style="margin-top: 50px;">
       <li>
           <a class="navigation-link" href="Profile.php">
           <i class='bx bxs-group'></i><em>Home</em>
           </a>
        </li>
        <li>
           <a class="navigation-link" href="Offers.php">
           <i class='bx bxs-group'></i><em>Offers</em>
           </a>
        </li>
        <li>
           <a class="navigation-link" href="Agents.php">
           <i class='bx bxs-building-house' ></i><em>Agents</em>
           </a>
        </li>
        <li>
           <a class="navigation-link" href="Map.php">
           <i class='bx bxs-building-house' ></i><em>Maps</em>
           </a>
        </li>
        <li>
           <a class="navigation-link mt-5" href="./server/Client-Logout.php">
           <i class='bx bx-log-out'></i><em>Logout</em>
           </a>
        </li>
       
        </div>



      </ul>
  </nav>
</div>
</body>
</html>
<script src="../assets/js/main.js"></script>