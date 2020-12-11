<?php
session_start();
include 'conf/koneksi.php';
if (empty($_GET['id'])){header('location: index.php');}
$getDonasiData = $koneksi->query("SELECT * FROM data_pengajuan where id='".$_GET['id']."' LIMIT 1")->fetch_assoc();
if ($getDonasiData['verifikasi'] == 0){header('location: index.php');}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/Formdonasi.css">
		
    </head>
    <body>
        <div class="form">
            <div class="kiri">
              <h1>Donasi<br/><b><?= $getDonasiData['judul']; ?></b></h1>
			  <form action="" method="POST">
			  <?php
				if (empty($_SESSION['username'])){
					echo '<input type="text" name="nama" placeholder="Nama" required/>';
				}else{

					echo '<input type="text" name="nama" value="'.$koneksi->query("SELECT nama FROM pengguna where username='".$_SESSION['username']."' LIMIT 1")->fetch_assoc()['nama'].'" placeholder="Nama" required/>';
				}
			  ?>
              <input type="text" name="jumlah" placeholder="Jumlah Dana" required />
              <input type="submit" name="donasi" value="Donasi" />
            </div>
            </form>
			<?php
			if (isset($_POST['donasi'])){
				$q = $koneksi->query("INSERT INTO donasi (id_kasus, nama_donatur, nominal, waktu) VALUES ('".$_GET['id']."', '".$_POST['nama']."', '".$_POST['jumlah']."', CURRENT_TIMESTAMP)");
				if($q){
					header('location: selamat.php?id='.$_GET['id']);
				}
			}
			?>
            <div class="kanan">
              <span class="break"><br/></span>
              <form action="#">
                <label>Scan Barcode OVO</label>
                <img src="image/barcode.jpeg" width="150px" height="125px">
              </form>
            </div>
          </div>
    </body>
</html> 