<?php 
$msg='';
$css_class='';
   $host = "localhost";
    $username = "root";
    $dbname = "tugasakhiruts";
    $password = "";

	$id = $_GET['id'];

    $db = new mysqli($host, $username, $password, $dbname);
    
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


if(isset($_POST['save-user'])){
	echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";
	
	$profileImageName = time() . '_' . $_FILES['profileImage']['name'];

	$target = 'images/' . $profileImageName;

	if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){
		$sql = "UPDATE ms_profil SET profil_picture='" . $profileImageName . "' WHERE userID=" . $id . ";";
		if (mysqli_query($db,$sql)){
		$msg = "Image uploaded and saved to database";
		$css_class = "alert-success";
	}else {
		$msg = "Database Error: Failed to saved user";
		$css_class = "alert-danger";
	}

	} else{
		$msg = "Failed to upload to upload";
		$css_class = "alert-danger";
	}
}



