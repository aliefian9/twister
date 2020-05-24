<?php 
include 'processform.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Page</title>

	<!-- boostrap 4-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-4 offset-md-4 form-div">
				<form action="changepicture.php" method="POST" enctype="multipart/form-data">
					
					<h3 class="text-center">Edit Profile</h3>


					<?php if(!empty($msg)): ?>
						<div class="alert <?php echo $css_class; ?>">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>
					<div class="form-group text-center">
							<img src="images/download.png" onclick="triggerClick()" id="profileDisplay">
							<label for="profileImage">Profile Image</label>
							<input name="profileImage" type="file" onchange="displayImage(this)" id="profileImage" style="display: none;">
					</div>

					<div class="form-group">
						<button type="submit" name="save-user" class="btn btn-primary btn-block">Save User</button>
					</div>		
				</form>
				<div>
					<button class="btn btn-primary btn-block" type="submit" onclick="JavaScript:window.location='profile.php';">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<script src="js/scripts.js"></script>
	

</body>
</html>

