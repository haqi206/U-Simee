<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "simee";
$koneksi = new mysqli($host, $user, $pass, $db);
if($koneksi->connect_error){
	die("ERROR ConnecT DaTabaSe");
}
?>

