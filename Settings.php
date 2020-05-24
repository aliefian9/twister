<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-collapse navbar-collapse-1 collapse" aria-expanded="true">
          <ul class="nav navbar-nav">
            <li>
              <a href="#main.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li>
              <a href="profile.php">Profile</a>
            </li>
          </ul>
          <div class="navbar-form navbar-right">
          </div>
        </div>
      </div>
    </div>

	<div id="content">
	  <?php
	    while ($row = mysqli_fetch_array($result)) {
	      echo "<div id='img_div'>";
	      	echo "<img src='images/".$row['image']."' >";
	      	echo "<p>".$row['image_text']."</p>";
	      echo "</div>";
	    }
	  ?>
	  <form method="POST" action="index.php" enctype="multipart/form-data">
	  	<input type="hidden" name="size" value="1000000">
	  	<div>
	  	  <input type="file" name="image">
	  	</div>
	  	<div>
	      <textarea 
	      	id="text" 
	      	cols="40" 
	      	rows="4" 
	      	name="image_text" 
	      	placeholder="Say something about this image..."></textarea>
	  	</div>
	  	<div>
	  		<button type="submit" name="upload">POST</button>
	  	</div>
	  </form>
	</div>

	<div id="content">
		<form method="post" action=""></form>
	</div>
</body>
</html>