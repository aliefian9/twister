<!DOCTYPE html>
<html>
<head>
	<title>Twister</title>
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- Data Tables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script type="text/javascript" src="js/login.js"></script>
	
	<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
	<!--Login Handler-->
	<script>
		function logincheck() {
			var req;
			req = $.ajax({
				url:"login-exe.php",
				type:"POST",
				data: {
					<?php echo "
						email:  $('#loginemail').val(),
						password:$('#loginpassword').val()
					";?>
				}
			});
			req.done(function(response,textStatus,jqXHR){
				if(response.indexOf("ok") != -1){
					window.location.replace("main.php");
				}else{
					$(".error").css({
					display:"block"
					})
				}
				alert(response);
			});
			req.fail(function(response,textStatus,errorThrown){
				alert("error : "+ textStatus, errorThrown);
			})

		}
	</script>

	<!--Signup Handler-->
	<script>
		function validate(){
			//cek pass dan confirm pass
			var password = $("#signuppassword").val();
            var confirmPassword = $("#confirm-password").val();
            if (password != confirmPassword) {
					$(".errorpass").css({
					display:"block"
					})
	        }
	        else{
	        	$(".errorpass").css({
					display:"none"
					})
	        	signupcheck();
	        }

		}
		function signupcheck() {
			//kirim data
			var req;
			req = $.ajax({
				url:"register-exe.php",
				type:"POST",
				data: {
					email:$('#signupemail').val(),
					password:$('#signuppassword').val(),
					fname:$('#fname').val(),
					lname:$('#lname').val(),
					gender:$('#gender').val(),
					birthdate:$('#birthdate').val(),
					alamat:$('#alamat').val(),
					profile_picture:$('#profile_picture').val()
				}
			});
			req.done(function(response,textStatus,jqXHR){
				if(response.indexOf("aman") != -1){
					$(".erroremail").css({
					display:"none"
					})
					window.location.replace("main.php");
				}else{
					$(".erroremail").css({
					display:"block"
					})
				}
			});
			req.fail(function(response,textStatus,errorThrown){
				alert("error : "+ textStatus, errorThrown);
			})

		}
	</script>
	<style>
		*{margin:0; padding:0px;}
		body{width:100%; font-family:helvetica;}
		#wrapper{text-align:center; width:100%;}
		#animated_div{width:100%; height:100%; background: url(image/bgbg.jpg); background-size:cover; animation: animatebackground 125s linear infinite;}
		@keyframes animatebackground
		{
			from {background-position: 0 0;}
			to {background-position: 0 -1000px;}
		}
	</style>
</head>
<body id="animated_div" align="center" style="margin-top: 115px;">
	<div>
		<a href="index.php" title="twister">
		<img src="image/twister.png" width="100px" align="center"/>
	</div>
	<br>

	<div class="container">
	    	<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#" class="active" id="login-form-link">Login</a>
								</div>
								<div class="col-xs-6">
									<a href="#" id="register-form-link">Register</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									
									<form onsubmit="logincheck(); return false;" style="display: block;" id="login-form">
							        	<div class="form-group">
										  <input type="email" class="form-control" name="loginemail" id="loginemail" placeholder="Masukkan Email anda" required>
										</div>

										<div class="form-group">
										  <input type="password" class="form-control" name="loginpassword" id="loginpassword" placeholder="Masukkan password" required>
										</div>
							        	<div class="error" style="color: red; display: none;">email tidak terdaftar atau password salah. silahkan coba lagi.<br>	</div>
							        	<button type="submit"" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login">Submit</button>
							        </form>

									<form onsubmit="validate(); return false;" id="register-form" style="display: none;">
										<div class="form-group">
											<input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="Nama Depan" value="" required>
										</div>
										<div class="form-group">
											<input type="text" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Nama Belakang" value="" required>
										</div>
										<div class="form-group">
											<input placeholder="Tanggal Lahir" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="birthdate" id="birthdate" tabindex="1" required>
										</div>
										<div class="form-group">
											<input type="alamat" name="alamat" id="alamat" tabindex="1" class="form-control" placeholder="Alamat Kamu" value="" required>
										</div>
					<div class="form-group">
			 			<input type="hidden" name="profile_picture" id="profile_picture" style="display: hidden;"  value="template.jpg">
					</div>
										<div class="form-group">
											  Gender : 
											  &nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="m" required> Male<br>
  											  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<t><input type="radio" name="gender" id="gender" value="f" required> Female<br>
										</div>
										<div class="form-group">
											<input type="email" name="signupemail" id="signupemail" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
										</div>
										<div class="form-group">
											<input type="password" name="signuppassword" id="signuppassword" tabindex="2" class="form-control" placeholder="Password" required>
										</div>
										<div class="form-group">
											<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
										</div>
										<div class="errorpass" style="color: red; display: none;">Password Tidak Sama.Silahkan Periksa Lagi
										</div>
										<div class="erroremail" style="color: red; display: none;">Email sudah terdaftar!
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<button type="submit"" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register">Register</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</body>
</html>