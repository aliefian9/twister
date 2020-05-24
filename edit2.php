<?php session_start() ?>

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
	<?php

	include 'koneksi.php';
	

	$idid = $_SESSION['idid'];
    
    
    $query = "SELECT * FROM ms_profil WHERE userID = '$idid' ";
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
			<div class="col-4 offset-md-4 form-div">

				<!--form action="proses.php" method="POST" enctype="multipart/form-data">
					
				</form-->
				
				<form action="update.php" method="POST" enctype="multipart/form-data">
					<h3 class="text-center">Edit Profile</h3>

					<div class="form-group text-center">
						<label for="nama_depan">Nama Depan</label>
						<input value="<?php echo $fname; ?>" name="nama_depan" id="nama_depan" class="form-control" required></input>
					</div>
					<div class="form-group text-center">
						<label for="nama_belakang">Nama Belakang</label>
						<input value="<?php echo $lname; ?>" name="nama_belakang" id="nama_belakang" class="form-control" required></input>
					</div>
					<div class="form-group text-center">
						<label for="birthdate">Tanggal Lahir</label>
						<input value="<?php echo $birthdate; ?>" name="birthdate" id="birthdate" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required></input>
					</div>
					<div class="form-group text-center">
						<label for="alamat">Alamat</label>
						<input value="<?php echo $alamat; ?>" name="alamat" id="alamat" class="form-control" required></input>
					</div>
			
					<div>
			 			<input type="hidden" name="userID" style="display: hidden;" value="<?php echo"$userid" ?>" required>			
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

</body>
</html>

