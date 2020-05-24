
	<?php  
        include 'koneksi.php';


        $email =$_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $alamat = $_POST['alamat'];
        $profile_picture = $_POST['profile_picture'];

        $md = md5($password);

        //check bahwa data unik
		$query = "SELECT * FROM ms_profil where email='$email'";
		$result = mysqli_query($db,$query);

        $cek = mysqli_num_rows($result);
        if($cek > 0){
			echo "error";
		}else{
			echo "aman";
            //masukin ke db
            $queryprofile = "INSERT INTO ms_profil (nama_depan,nama_belakang,gender,email,password,birthdate,alamat,profil_picture) VALUES ('$fname','$lname','$gender','$email','$md','$birthdate','$alamat','$profile_picture')";
            mysqli_query($db,$queryprofile);
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "login"; 
            echo "<script>window.location.assign('main.php')</script>";

		}
?>
        
