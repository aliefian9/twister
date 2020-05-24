<?php
  session_start();
  $email = $_SESSION['email'];
  $postid = $_POST['postid'];
  $comment = $_POST['comment'];

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
      if(isset($comment)) {
        $qs = "INSERT INTO komentar (postID,userID, komentar)
        VALUES (
        '".$postid."',
        '".$userid."',
        '".$comment."'
        )";
        $querySimpan = mysqli_query($db,$qs);
      }
      $_SESSION['postid'] = $postid;
      header('location: comment.php');

?>