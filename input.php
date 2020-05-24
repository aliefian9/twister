<?php
session_start();
		include 'koneksi.php';
		$id = $_POST['userID'];
		$nama_depan = $_POST['fname'];
		$nama_belakang = $_POST['lname'];
		$birthdate = $_POST['birthdate'];
		$alamat = $_POST['alamat'];
	
			$title_file = $_POST['title_file'];
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			  $acak           = rand(1,99);
			  $nama_file_unik = $acak.$nama; 

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)
			{
				if($ukuran < 1044070)
				{			
					$null = NULL;
					move_uploaded_file($file_tmp, 'file/'.$nama_file_unik);
					$query = "UPDATE ms_profil SET profil_picture='" . $nama_file_unik . "' WHERE userID=" . $id . ";";



					mysqli_query($db, $query)
					or die ("Gagal Perintah SQL".mysql_error());
					if($query){								

									$_SESSION['idid'] = $id;
									header('location:edit2.php');
								}
								else
								{								
									$_SESSION['pesan'] = 'Gagal Upload Gambar';
									header('location:edit.php');
								}
				}
				else
				{		
					header('location:form.php');
				}
			}
			else
			{		
				header('location:form.php');
			}


		?>
