<?php
include 'conf/koneksi.php';
session_start();
if(empty($_SESSION['admin'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<link href= "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
		<style>
		a{
			color:red;
		}
		</style>
    </head>
    <body>
        <div class="header">
            <div>
                <h1 >Selaman Datang</h1>
                <p>Berlakkulah Secara Jujur</p>
            </div>
        </div>

        <div class="navbar">
            <img class="logo" src="image/sime.png" height="20%" width="20%" alt="logo">
            <nav>
                <ul class="nav1">
                    <li><a href="Logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="column middle">
                <table>
                    <tr>
                      <th>Nama Pengaju</th>
                      <th>Judul</th>
                      <th>Email</th>
                      <th>Nomor Handphone</th>
                      <th>Jumlah dana</th>
                      <th>Tanggal</th>
                      <th>Foto Kejadian</th>
                      <th>Surat Pernyataan</th>
                      <th>Deskripsi Kejadian</th>
					  <th>Status</th>
					  <th>Aksi</th>
					  <?php
						$q = $koneksi->query("SELECT * FROM data_pengajuan ORDER BY verifikasi DESC");
						while($row = $q->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$koneksi->query("SELECT nama FROM pengguna where id='".$row['id_pengaju']."'")->fetch_assoc()['nama']."</td>";
							echo "<td>".$row['judul']."</td>";
							echo "<td>".$row['email']."</td>";
							echo "<td>".$row['no_hp']."</td>";
							echo "<td>".$row['dana']."</td>";
							echo "<td>".$row['tanggal_kejadian']."</td>";
							echo "<td><a href=\"download.php?id=".$row['id']."&type=fk\">Download Lampiran</a></td>";
							echo "<td><a href=\"download.php?id=".$row['id']."&type=sp\">Download Lampiran</a></td>";
							echo "<td><a href=\"download.php?id=".$row['id']."&type=dk\">Download Lampiran</a></td>";
							if ($row['verifikasi'] == 0){
								echo "<td>Belum terverifikasi</td>";
								echo "<td><form action='' method='POST'><input type='hidden' name='id' value='".$row['id']."'/><button type='submit' name='verif' style='color:black;'>Verifikasi</button></form></td>";
							}else{
								echo "<td>Sudah terverifikasi</td>";
								echo "<td><button style='color:black;' disabled>Verifikasi</button></td>";
							}
							//echo "<td><form action='' method='POST'><input type='hidden' name='id' value='".$row['id']."'/><button type='submit' name='verif' style='color:black;'>Verifikasi</button></form></td>";
							echo "</tr>";
						}
					  ?>
                    
                  </table>
				  <?php
					if (isset($_POST['verif'])){
						$koneksi->query("update data_pengajuan set verifikasi='1' where id='".$_POST['id']."'");
						header('refresh: 1;');
					}
				  ?>
            </div>
          </div>
    </body>
</html>