<?php
require './client/Client-Validation.php';


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
<script src="https://kit.fontawesome.com/6e0e6df0b8.js" crossorigin="anonymous"></script>

    

<link rel="stylesheet" href="./assets/style/main.css">
<link rel="stylesheet" href="./assets/style/animations.css">

    <title>Admin Dashboard</title>
</head>
<body>
<?php  require './components/Client-sidebar.php'; ?>
<div class="container">
<h2 class="houses-title mt-5" >Agents</h2>
<div className="input-container">
  <input type="text" name="search" id="search" autoComplete="off" placeholder="Find Agent" class="agent-input mt-5" />
  
  <div class="mt-5" id="agents"></div>
</div>


 </div>

 
</body>
<script src="./assets/js/main.js"></script>
</html>
<script>
    $(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:'./components/Client-Search.php',
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#agents').html(data);
			}
		});
	}
	
	$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>

