<!DOCTYPE html>
<html>
  <head>
  	<title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
      function clearform(){
        document.status.reset();
      } 
    </script>
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
          $birthdate = $row['birthdate'];
          $alamat = $row['alamat'];
          $gambar = $row['profil_picture'];
        }

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
      ?>
      <style>
        .media{
          border-style: initial;
        }
        .comment{
          padding-left: none;
        }
      </style>
  </head>

  <script type = "text/javascript" >
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
  </script>

  <body onload="clearform();" background = "image/bgbg.jpg">
  	<div class="navbar navbar-default navbar-static-top">
  	  <div class="container">
  	    <div class="navbar-collapse navbar-collapse-1 collapse" aria-expanded="true">
  	      <ul class="nav navbar-nav">
  	        <li>
  	          <a href="main.php"><span class="glyphicon glyphicon-home"></span> Home</a>
  	        </li>
  	        <li class="active">
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

    

    <!-- status profile kita -->
      <div class="col-sm-6" style="margin-left: 350px;">
        <div class="panel panel-default">
          <div class="panel-body">
            <table>
              <tr>
                <th style="column-width: 300px;"><img src="file/<?php echo $gambar; ?>" width="200px" height="200px"></th>
                <th>
                  <div align="left">
                    Name        :
                    <?php 
                      echo $fname.' '.$lname . "<br>";
                    ?>

                    Date Birth :
                    <?php 
                     echo $birthdate . "<br>";
                    ?>

                    Address    :
                    <?php 
                     echo $alamat . "<br>";
                    ?>
                    <?php echo "<a href=\"edit.php?id=".$userid."\">Edit Profile</a>"; ?>   
                  </div>
                </th>
              </tr>
            </table>
          </div>
        </div>
        <!--form bikin status-->
            <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="media">
                    <a class="media-left" href="#fake">
                      <img alt="" class="media-object img-rounded" src="file/<?php echo $gambar; ?>" width="35px" height="35px">
                    </a>
                    <div class="media-body">
                      <form action="profile.php" method="POST" class="text-center" name="status">
                        <div class="form-group has-feedback">
                          <label class="control-label sr-only" for="inputSuccess5">Hidden label</label>
                          <input type="text" class="form-control" id="status" name="status" aria-describedby="search" required>
                          <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                          <span id="search2" class="sr-only">(success)</span>
                        </div>
                          <input class="btn btn-primary" type="submit" value="twister">
                        </form>
                    </div>
                  </div>
            </div>

      <!-- UNTUK MENAMPILKAN BAGIAN STATUS DARI 157 - 178 -->
      <!--load status-->
                <div class="panel-body">

                  <?php  
               $qs_status = "select * from post as p,ms_profil as mp where p.userid = mp.userid and p.userid= '$userid'";
               $result2 = $db->query($qs_status);
               while ($row2 = $result2->fetch_assoc()) {
                    $empat= $row2['postID'];
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
  </body>
</html>