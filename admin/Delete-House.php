<?php
	function pdo_connect_mysql() {
		$DATABASE_HOST = 'localhost';
		$DATABASE_USER = 'root';
		$DATABASE_PASS = 'WebDev19';
		$DATABASE_NAME = 'KBHestate';
		try {
		  return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
		} catch (PDOException $exception) {
		  die ('Failed to connect to database!');
		}
	  }
	  $pdo = pdo_connect_mysql();
	  $msg = '';
	  if (isset($_GET['house_id'])) {
		  $stmt = $pdo->prepare('SELECT * FROM houses WHERE house_id = ?');
		  $stmt->execute([$_GET['house_id']]);
		  $house = $stmt->fetch(PDO::FETCH_ASSOC);
		  if (!$house) {
			  die ('house doesn\'t exist with that ID!');
		  }
		  if (isset($_GET['confirm'])) {
			  if ($_GET['confirm'] == 'yes') {
				  $stmt = $pdo->prepare('DELETE FROM houses WHERE house_id = ?');
				  $stmt->execute([$_GET['house_id']]);
				  $msg = 'You have deleted the house!, <a href="./Houses.php">Go Back</a>';
			  } else {
				  header('Location: Houses.php');
				  exit;
			  }
		  }
	  } else {
		  die ('No ID specified!');
	  }
	
?>

<html>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container justify-content-center mt-5">
			<div class="delete-house justify-content-center">
	<h2>Is house #<?=$house['house_id']?> sold?</h2>
                            <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete house #<?=$house['house_id']?>?</p>
    <div class="yesno">
        <a href="Delete-House.php?house_id=<?=$house['house_id']?>&confirm=yes">Yes</a>
        <a href="Delete-House.php?house_id=<?=$house['house_id']?>&confirm=no">No</a>
	</div>
	</div>
	</div>
    <?php endif; ?>
	</body>
</html>