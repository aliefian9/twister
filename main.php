<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
      session_start();
      $email = $_SESSION['email'];

      include 'koneksi.php';

      $query = "SELECT * FROM ms_profil where email = '$email'";
      $result = $db->query($query);
      while ($row = $result->fetch_assoc()) {
        $userid =  $row['userID'];
        $fname = $row['nama_depan'];
        $lname =  $row['nama_belakang'];
        $email = $row['email'];
        $gender =  $row['gender'];
        $gambar = $row['profil_picture'];
      }

      // buat lihat daftar teman
      $query1 = "SELECT * FROM ms_profil where email != '$email'";
      $result1 = $db->query($query1);


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

      $post = "SELECT * FROM post where userID ='$userid'";
      $result2 = $db->query($post);


    ?>
    <script type = "text/javascript" >
      function preventBack(){window.history.forward();}
      setTimeout("preventBack()", 0);
      window.onunload=function(){null};
    </script>
  </head>

  <body onload="clearform();" background = "image/bgbg.jpg">
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-collapse navbar-collapse-1 collapse" aria-expanded="true">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#fake"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li>
              <a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>
          </ul>

          <form action="logout.php">
            <div class="navbar-form navbar-right">
              <button class="btn btn-primary" type="submit" aria-label="Left Align" value="back">
                logout
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="panel panel-default">
            <div class="panel-body">
              <a href="#"><img class="img-responsive" alt="" src="file/<?php echo $gambar; ?>" width="300px" height="200px"></a>

              <!--Div Profile Mini-->
              <div>
                <!-- Name-->
                  <h5>
                    <small>Name</small>
                    <?php 
                      echo $fname.' '.$lname;
                    ?>
                  </h5>

                  <!--Gender-->
                  <h5>
                    <small>Gender</small>
                    <?php 
                      if($gender == 'm'){
                        echo "Male";
                      }
                      else{
                        echo "Female";
                      }
                    ?>
                  </h5>

                  <!--Email-->
                   <h5>
                    <small>Email</small>
                    <?php 
                      echo $email;
                    ?>
                  </h5> 
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="media">
                <a class="media-left" href="#fake">
                  <img alt="" class="media-object img-rounded" src="file/<?php echo $gambar; ?>" width="35px" height="35px">
                </a>
                <div class="media-body">
                    <form action="main.php" method="POST" class="text-center"> <!--  disini masih salah   -->
                  <div class="form-group has-feedback">
                    <label class="control-label sr-only" for="inputSuccess5">Hidden label</label>
                    <input type="text" class="form-control" id="search2" name="status" aria-describedby="search" required>
                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                    <span id="search2" class="sr-only">(success)</span>
                  </div>
                    <input class="btn btn-primary" type="submit" value="twister">
                  </form>
                </div>
              </div>
            </div>

            <div class="panel-body">

          
            <?php  
               $qs_status = "SELECT * FROM post as p join ms_profil as mp on (p.userID = mp.userID)";
               $result2 = $db->query($qs_status);
               while ($row2 = $result2->fetch_assoc()) {
                    $satu = $row2['content'];
                    $dua = $row2['nama_depan'];
                    $tiga = $row2['nama_belakang'];
                

                echo "
                  <div class=\"media\">
                    <a class=\"media-left\" href=\"#fake\">
                      <img alt=\"\" class=\"media-object img-rounded\" src=\"file/$gambar\" width=\"64px\" height=\"64px\">
                    </a>
                    <div class=\"media-body\">
                      <h4 class=\"media-heading\">".$dua.' '.$tiga."</h4>
                      <p>".$satu."</p>
                      <ul class=\"nav nav-pills nav-pills-custom\">
                      </ul>
                    </div>
                    <div class=\"comment\">
                    <form action='comment.php' method='POST' name='form' style='padding-top:10px;'>
                      <button class='btn' id='commentbtn' name='id' type='submit' value='".$row2['postID']."'>
                      Comment
                      </button>
                    </form>
                    </div>
                    <hr>
                  </div>
                ";
               }
            ?>
            </div>
          </div>

          <br>
          <br>
          
        </div>

        <div class="col-sm-3">
          <div class="panel panel-default panel-custom">
            <div class="panel-heading">
              <h3 class="panel-title">
                List Teman
              </h3>
            </div>
            <div class="panel-body">

            <!--  BUAT MUNCULIN DAFTAR TEMEN   -->
            <?php
              while ($row1 = $result1->fetch_assoc()) {
                echo "<div class=\"media\">";
                echo "<div class=\"media-left\">";
                echo "<img src=\"file/$gambar\" width=\"32px\" height=\"32px\" alt=\"\" class=\"media-object img-rounded\">";
                echo "</div>";
                echo "<div class=\"media-body\">";
                echo "<h4 class=\"media-heading\"> <a href=\"profile_temen.php?id=".$row1['userID']."\">".$row1["nama_depan"]." ".$row1["nama_belakang"]."</a></h4>";
                echo "</div>";
                echo "</div>";
              }
            ?>

            </div>
            <div class="panel-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>