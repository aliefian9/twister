<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Page</title>

	<!-- boostrap 4-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


</head>
<body>
	<?php

	include 'koneksi.php';

	$id = $_GET['id'];

	session_start();

	
    
    
    $query = "SELECT * FROM ms_profil WHERE userID='$id'";
    $result = $db->query($query);

      while ($row = $result->fetch_assoc()) {
        $userid =  $row['userID'];
        $fname = $row['nama_depan'];
        $lname =  $row['nama_belakang'];
        $profil_picture = $row['profil_picture'];
        $email = $row['email'];
        $gender =  $row['gender'];
        $birthdate = $row['birthdate'];
        $alamat = $row['alamat'];
      }

  	?>

	<body background = "image/bgbg.jpg">
	<div class="container" style="margin-top: 100px;">
		<div class="row">
			<div class="col-6 offset-sm-3 form-div">
				<div class="top">
					<!--form action="proses.php" method="POST" enctype="multipart/form-data">
						
					</form-->
					
					<form action="update.php" method="POST" enctype="multipart/form-data">
						<h3 class="text-center">Ganti Foto</h3>
						<div class="text-center">
							<?php echo "<a class=\"btn btn-primary\" href=\"form.php?id=".$id."\">Upload Foto</a>" ?> 
						</div>

				
						<div>
				 			<input type="hidden" name="userID" style="display: hidden;" value="<?php echo"$userid" ?>">			
						</div>

						
							<!--input type="submit" name="save-user" class="btn btn-primary" value="Save"-->
							<a href="profile.php" class="btn btn-default" style="margin-right:3%">Cancel</a>
						

					</form>

			</div>
		</div>
	</div>
</div>

</body>
</html>

