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
    if(isset($_POST['id'])){
      $id = $_POST['id'];      
    }
    else{
      $id= $_SESSION['postid'];
    }

    $qs_status = "SELECT * FROM post as p join ms_profil as mp where p.postID=$id and p.userID = mp.userID";
     $result2 = $db->query($qs_status);
     while ($row2 = $result2->fetch_assoc()) {
          $pid= $row2['postID'];
          $cntnt = $row2['content'];
          $fnpost = $row2['nama_depan'];
          $lnpost= $row2['nama_belakang'];
    }

?>
<!DOCTYPE html>
<html>
<head>
  
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
</head>
<body onload="clearform();" background = "image/bgbg.jpg">
  <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-collapse navbar-collapse-1 collapse" aria-expanded="true">
          <ul class="nav navbar-nav">
            <li>
              <a href="main.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li class="active">
              <a href="profile.php">Profile</a>
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


    <div class="panel panel-default col-sm-6 col-sm-offset-3">
      <div class="panel-body"> 
        <div>
      <h2 color: skyblue;>
        <?php
        echo "$fnpost $lnpost ";
        ?>
      </h2>
      <hr>
      <h3>
        <?php
        echo "$cntnt " ;
        ?>

      </h3>
      <br>
      <form action="comment_exe.php" method="POST" name="comment">
<!--         <input type="text" name="comment" style="width: 80%">
        <input type="hidden" name="postid" style="display: hidden;" value='<?php echo"$pid" ?>'>
        <input type="submit" name=""> -->
<div class="form-group has-feedback">
                    <label class="control-label sr-only" for="inputSuccess5">Hidden label</label>
                    <input type="text" class="form-control" name="comment" aria-describedby="search" required>
                    <input type="hidden" name="postid" style="display: hidden;" value='<?php echo"$pid" ?>'>
                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                    <input type="submit" class="btn btn-primary" style="margin-top: 20px;">
                    <span id="search2" class="sr-only">(success)</span>
                  </div>
      </form>
      <br>
    </div>



    <!--load comment-->
    <div name="comment" class="panel-body">
      <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tugasakhiruts";

        $db = new mysqli($host,$username,$password,$dbname);
        $komen = "SELECT * FROM komentar as k join ms_profil as mp where k.postid='$id' and k.userid = mp.userid ";
        $result3 = $db->query($komen);
        while ($row3 = $result3->fetch_assoc()) {    
           echo "
           <div class=\"panel-body\">
            <h5>".$row3['nama_depan']." ".$row3['nama_belakang'] ."</h5> 
            <h5>".$row3['komentar']."</h5>
            <hr>
          </div>

        
          ";
        }

      ?>
      
    </div>
      </div>
    </div>
    
</body>
</html>