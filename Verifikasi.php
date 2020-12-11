<?php
session_start();

include 'conf/koneksi.php';
if (empty($_SESSION['username'])){
	header('location: index.php');
}
if (empty($_SESSION['ajukan'])){
	header('location: Pengajuan.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/Verifikasi.css">
    </head>
    <body>
        <div class="verifikasi">
            <div class="konten">
              <h1>Ajukan Dana</h1>
              <p style="text-align: center;">Harap tunggu pihak Dari U-Simme mengenai Keberhasilan proses pengajuan dana</p>
              <img src="image/makasih.png" width="300px" height="125px">
              <a href="index.php"><button class="btn">Home</button></a>
            </div> 
    </body>
</html> 