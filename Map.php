<!DOCTYPE html>
<html lang="en">
<head>
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARjls92MF9MxTLGWvHLuHR0wTkR-lPoJQ&callback=initMap">
</script>
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
<body>
<?php require './components/Client-sidebar.php'; ?>
<div class="container">
<div class="row">
    <div class="col-6 mt-5" >
    <div id="map"></div>
    </div>
    <div class="col-6"></div>
</div>
</div>

</body>
</html>

<style>
#map {
        height: 800px;
        width: 100%;
    
}
</style>

<script src="./assets/js/main.js"></script>