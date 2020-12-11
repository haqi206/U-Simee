<?php
session_start();
include 'conf/koneksi.php';
if (empty($_GET['id'])){header('location: index.php');}
$getDonasiData = $koneksi->query("SELECT * FROM data_pengajuan where id='".$_GET['id']."' LIMIT 1")->fetch_assoc();
include 'conf/koneksi.php';
if (empty($_SESSION['username'])){
	header('location: index.php');
}/*
if (empty($_SESSION['donasi'])){
	header('location: Pengajuan.php');
}
*/

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
              <h1>Donasi</h1>
              <p style="text-align: center;">Terima kasih telah berdonasi untuk <b><?= $getDonasiData['judul']; ?></b></p>
              <img src="image/makasih.png" width="300px" height="125px">
              <a href="index.php"><button class="btn">Home</button></a>
            </div> 
    </body>
</html> 