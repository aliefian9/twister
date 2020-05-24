<?php 
      session_start();
      $email = $_SESSION['email'];

      // LOAD DATA DARI MS_PROFIL
      
      include 'koneksi.php';

      $query = "SELECT * FROM ms_profil where email = '$email'";
      $result = $db->query($query);
      while ($row = $result->fetch_assoc()) {
        $userid =  $row['userID'];
        $fname = $row['nama_depan'];
        $lname =  $row['nama_belakang'];
        $email = $row['email'];
        $gender =  $row['gender'];
      }
      // LOAD DATA STATUS.   JIKA BELOM ADA STATUS SAMA SEKALI, BELOM ADA TAMPILAN, JIKA SUDAH DI BIKIN DATA BARU DEH MUNCUL DATANYA
      if(isset($_POST['status'])) {
        $null = NULL;
        $qs = "INSERT INTO post (postID, userID, content)
        VALUES (
        '".$null."',
        '".$userid."',
        '".$_POST['status']."'
        )";
        $querySimpan = mysqli_query($db,$qs);
      }

      echo "<script>
          window.history.back();
        </script>
        ";
    ?>