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
		<link rel="stylesheet" type="text/css" href="css/Donasi.css">
		<link href= "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar">
            <a href="index.php">Back</a>
          </div>
          <div class="donasi">
              <div class="isi">
                <div class="isi2">
                    <div class="main">
                      <h2><?= $getDonasiData['judul']; ?></h2>
                      <img src="<?= $getDonasiData['foto_kejadian']; ?>">
                      <ul>
                          <li><?= $koneksi->query("SELECT nama from pengguna where id='".$getDonasiData['id_pengaju']."'")->fetch_assoc()['nama']; ?></li>
                          <li><?= $getDonasiData['tanggal_kejadian']; ?></li>
                          <li><?= number_format($getDonasiData['dana'], 0, '', '.'); ?></li>
                      </ul>
                      <br>
                      <hr>
                      <br>
                      <h5>Deskripsi</h5><br>
                      <p style="text-align:justify">Banjir Bandang yang menerjang kabupaten newnew </p>
                      <br>
                      <a href="Formdonasi.php?id=<?= $getDonasiData['id']; ?>"><button class="btn">Donasi</button></a>
                    </div>
                  </div>
              </div>
          </div>
          
          <div class="footer">
            <p>© copyright U-simee</p>
          </div>
    </body>
</html>