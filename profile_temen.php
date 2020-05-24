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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).OnClick(function(){
			$('#myModal').modal({
				keyboard: false,
				show: true,
				backdrop: 'static'
			});
		});
	</script>

  	<script type = "text/javascript" >
	    function preventBack(){window.history.forward();}
	    setTimeout("preventBack()", 0);
	    window.onunload=function(){null};
	</script>

</head>


<?php 
    // LOAD DATA DARI MS_PROFIL
    
    include 'koneksi.php';
    
    $id = $_GET['id']; 
    
    $query = "SELECT * FROM ms_profil where userID = '$id'";
    $result2 = $db->query($query);
    while ($row2 = $result2->fetch_assoc()) {
      $fname = $row2['nama_depan'];
      $userid =  $row2['userID'];
      $lname =  $row2['nama_belakang'];
      $email = $row2['email'];
      $gender =  $row2['gender'];
	    $birthdate = $row2['birthdate'];
      $alamat = $row2['alamat'];
      $gambar = $row2['profil_picture'];  
    }

      $post = "SELECT * FROM post where userID ='$id'";
      $result1 = $db->query($post);
  ?>



<body onload="clearform();" background = "image/bgbg.jpg">

	<div class="navbar navbar-default navbar-static-top">
	  <div class="container">
	    <div class="navbar-collapse navbar-collapse-1 collapse" aria-expanded="true">
	      <ul class="nav navbar-nav">
	        <li>
	          <a href="main.php"><span class="glyphicon glyphicon-home"></span> Home</a>
	        </li>
	        <li class="active">
            <?php echo " <a href=\"profile_temen.php?id=".$id."\"><span class=\"glyphicon glyphicon-user\"></span>"." ".$fname." ".$lname."</a>";?>
	        </li>
	      </ul>
	      <div class="navbar-form navbar-right">
	      	<div>
			     <form action="logout.php">
                  <button class="btn btn-primary" type="submit" aria-label="Left Align" value="back">
		                logout
		              </button>
		          </form>
	      	</div>

	      </div>
	    </div>
	  </div>
	</div>

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
		 					</div>
	 					</th>
	 				</tr>
	 			</table> 
	 		</div>
	 	</div>     
      <div class="panel panel-info">

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
                    <hr>
                    <div class=\"comment\" >
                    <form action='comment.php' method='POST' name='form'>
                     <button class='btn' id='commentbtn' name='id' type='submit' value='".$row2['postID']."'>
                      Comment
                      </button>
                    </form>
                    </div>
                  </div>
                ";
            }
                ?>



          
        </div>
      </div>

      <br>
      <br>
      <br>


      <div class="panel panel-default">
      </div>
    </div>
</body>
</html>