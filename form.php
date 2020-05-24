<?php 
session_start();

$id = $_GET['id'];

      include 'koneksi.php';

      $query = "SELECT * FROM ms_profil where email = '$id'";
      $result = $db->query($query);
      while ($row = $result->fetch_assoc()) {
        $userid =  $row['userID'];
        $fname = $row['nama_depan'];
        $lname =  $row['nama_belakang'];
        $email = $row['email'];
        $gender =  $row['gender'];
        $birthdate = $row['birthdate'];
        $alamat = $row['alamat'];
      }
?>

<html>
<title>Upload Foto</title>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

 <body background = "image/bgbg.jpg">

<div class="container" style="margin-top:8%">
	<div class="row">
		<div class="col-md-5 col-md-offset-3"> 
			<div style="height:55px;">
				 <?php 
					if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
						echo '<div id="pesan" class="alert alert-danger" style="display:none;">'.$_SESSION['pesan'].'</div>';
					}
					$_SESSION['pesan'] = '';
				?>
			</div>
			<br>
				<form action="input.php" method="post" enctype="multipart/form-data">
					<h2 class= "text-center" style="margin-top: 10px;"> Upload Foto </h2>
							<div>
								<label>Pilih Foto</label>
								<input type="file" name="file">
							</div>
					<br>
					<br>

					<div>
			 			<input type="hidden" name="userID" style="display: hidden;" value="<?php echo"$id" ?>">			
					</div>
					<div>
			 			<input type="hidden" name="fname" style="display: hidden;" value="<?php echo"$fname" ?>">			
					</div>
					<div>
			 			<input type="hidden" name="lname" style="display: hidden;" value="<?php echo"$lname" ?>">			
					</div>
					<div>
			 			<input type="hidden" name="birthdate" style="display: hidden;" value="<?php echo"$birthdate" ?>">			
					</div>					
					<div>
			 			<input type="hidden" name="alamat" style="display: hidden;" value="<?php echo"$alamat" ?>">			
					</div>		


					<button type="submit" class="btn btn-primary pull-center">Upload</button>
					<a href="main.php" class="btn btn-default" style="margin-right:3%">Cancel</a>
				</form>
		</div>
	</div>
</div>
	<script type="text/javascript" src="style/jquery.js"></script>
        <script>
            $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
        </script>
</body>
</html>