<?php


 
$servername = "localhost";
$username = "id13779694_aliefian";
$password = "!06J+l[=>@#siLq#";
$dbname = "id13779694_twitchat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);





$userID = $_POST['userID'];
$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$birthdate = $_POST['birthdate'];
$alamat = $_POST['alamat'];



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



	$sql = "UPDATE ms_profil SET nama_depan='" . $nama_depan . "', nama_belakang='" . $nama_belakang . "', birthdate='" . $birthdate . "', alamat='" . $alamat . "' WHERE userID=" . $userID . ";";

	if ($conn->query($sql) === TRUE) {
	    echo "<script>window.location.assign('profile.php')</script>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
?>