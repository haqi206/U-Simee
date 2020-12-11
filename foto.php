<?php
include 'conf/koneksi.php';

$q = $koneksi->query("SELECT * FROM pengguna");
while ($row = $q->fetch_assoc()){
	echo "<img src='".$row['file_ktp']."'><br/><br/>";
}
?>