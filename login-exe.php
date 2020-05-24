
    <?php  
        include 'koneksi.php';
  

        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        $mdmd = md5($password);

        $query = "SELECT * FROM ms_profil where email='$email' AND password = '$mdmd'";  
        $result = mysqli_query($db,$query);

        $cek = mysqli_num_rows($result);
        if($cek > 0){
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "login"; 
            echo "ok";
        }else{
          echo "no";
        }


        ?>
