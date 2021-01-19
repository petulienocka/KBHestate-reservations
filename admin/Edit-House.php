<!DOCTYPE html>
<?php
    require './Connection.php';
    
	if(ISSET($_POST['edit_house'])){
		$city = $_POST['city'];
		$street = $_POST['street'];
		$postCode = $_POST['postCode'];
		$price = $_POST['price'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/properties/" . $_FILES['photo']['name']);
		$conn->query("UPDATE `houses` SET `city` = '$city', `street` = '$street', `postCode` = '$postCode', `price` = '$price', `photo` = '$photo_name' WHERE `house_id` = '$_REQUEST[house_id]'") or die(mysqli_error());
		header("location: Houses.php");
	}
?>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
   
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	</head>
<body>

	<div class = "container mt-5">
		<h4 style="color: #243e56;">Edit House</h4>
		<div class="edit justify-content-center">
					<?php
						$query = $conn->query("SELECT * FROM `houses` WHERE `house_id` = '$_REQUEST[house_id]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>
					<form method = "POST" enctype = "multipart/form-data" class="justify-content-center mt-5">
					<div class="row">
						<div class="col-6">
						<div class = "form-group">
							<label>Price </label>
							<input type = "number" min = "0" max = "999999999" value = "<?php echo $fetch['price']?>" class = "form-control" name = "price" />
							</div>
							</div>

							<div class="col-6">
							<div class = "form-group">
							<label>City </label>
							<input type = "text"  value = "<?php echo $fetch['city']?>" class = "form-control" name = "city" />
							</div>
							</div>
						</div>

						<div class="row mt-5">
							<div class="col-6">
							<div class = "form-group">
							<label>Street </label>
							<input type = "text"  value = "<?php echo $fetch['street']?>" class = "form-control" name = "street" />
						    </div>
							</div>
							<div class="col-6">
						<div class = "form-group">
							<label>Post Code </label>
							<input type = "number" min = "0" max = "999999999" value = "<?php echo $fetch['postCode']?>" class = "form-control" name = "postCode" />
						</div>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-6">
							<div class = "form-group ">
							<label>Photo </label>
							<div  id = "preview" style = "width:500px; height :500px;">
								<img src = "../assets/properties/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
							</div>
							<input class="mt-3" type = "file" id = "photo" name = "photo" />
							<button name = "edit_house" class = "form-control mt-2">Update</button>
						</div>
							</div>
						</div>	
						
					</form>
					</div>

</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>