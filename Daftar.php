<?php
session_start();

include 'conf/koneksi.php';
if (!empty($_SESSION['username'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/Daftar.css">
				<style>
		input::-webkit-file-upload-button{
			margin-top: 5px;
			width: 80px;
			height: 25px;
			border: 1px solid #0088a9;
			border-radius: 10px;
			color: #0088a9;
			text-transform: uppercase;
			outline: none;	
			font-size:10px;
			padding:5px;
		}
		input::-webkit-file-upload-button:hover{
			cursor: pointer;
		}

		</style>
    </head>
    <body>
        <div class="daftar">
            <div class="konten">
              <h1>Daftar</h1>
			  <form action="" method="post" enctype="multipart/form-data">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" id="pw" onkeyup="changePW()" name="password" placeholder="Password" required/>
              <input type="password" id="repw" onkeyup="changePW()" name="conpass" placeholder="Konfirmasi Password" required/>
			  <div id="alert" style="color:red;display:none;"></div>
              <input type="text" name="nama" placeholder="Nama Lengkap" required/>
              <input type="text" name="no_ktp" min='18' placeholder="Nomor KTP"required />
              <input type="date" name="tanggal" placeholder="Tanggal Lahir" required />
              <input type="text" name="alamat" placeholder="alamat" required/>
              <label>Foto KTP</label>
              <input type="file" id="fotoktp" class="unggah" name="fotoktp">
              <input type="submit" id="ajukan" name="daftar" value="Daftar" />
			  </form>
			  <?php
			  if (isset($_POST['daftar'])){
				  $allowed = array('gif', 'png', 'jpg');
					$filename = $_FILES['fotoktp']['name'];
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					if (in_array($ext, $allowed)) {
						if ($_FILES["fotoktp"]["size"] > 200000) {
						  echo "<script>File maksimal 200kb</script>";
						}else{
							$lok = "image/noktp/".$_FILES["fotoktp"]["name"];
							if (move_uploaded_file($_FILES["fotoktp"]["tmp_name"], $lok)){
								$check = $koneksi->query("SELECT * from pengguna where username='".$_POST['username']."' or no_ktp = '".$_POST['no_ktp']."'");
								  if ($check->num_rows == 0){
									  $add = $koneksi->query("INSERT INTO pengguna (username, password, nama, no_ktp, tanggal_lahir, alamat, file_ktp) values ('".strtolower($_POST['username'])."', '".$_POST['password']."', '".$_POST['nama']."', '".$_POST['no_ktp']."', '".$_POST['tanggal']."', '".$_POST['alamat']."',  '".$lok."')");
										if ($add){
											header('location: login.php');
										}else{
											echo $koneksi->error;
										}
										
								  }else{
									  echo "<script>alert('Username atau Nomor KTP telah terdaftar');</script>";
								  }
							}
						}
					}else{
						echo "<script>File harus berupa gambar</script>";
					}

			  }
			  ?>
            </div> 
			<script type="text/javascript">
				function changePW(){
					if (document.getElementById("pw").value != document.getElementById("repw").value){
						document.getElementById("alert").style.display = "block";
						document.getElementById("alert").innerHTML = "*Password tidak sesuai<br/><br/>";
						document.getElementById("repw").style.border = "1px solid red";
						document.getElementById("ajukan").disabled = true;
					}else{
						document.getElementById("alert").style.display = "none";
						document.getElementById("alert").innerHTML = "&nbsp;";
						document.getElementById("repw").style.border = "1px solid #AAA";
						document.getElementById("ajukan").disabled = false;
					}
				}
			</script>
    </body>
</html> 