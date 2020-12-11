<?php
session_start();

include 'conf/koneksi.php';
if (empty($_SESSION['username'])){
	header('location: index.php');
}
$getUserLogin = $koneksi->query("SELECT * FROM pengguna where username='".$_SESSION['username']."'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/Pengajuan.css">
		
    </head>
    <body>
        <div class="pengajuan">
            <div class="konten">
              <h1>Ajukan Dana</h1>
			  <form action="" method="POST" enctype="multipart/form-data">
              <input type="text" name="nama" value="<?= $getUserLogin['nama']; ?>" placeholder="Nama Pengaju Dana" readonly/>
              <input type="text" name="judul" placeholder="Judul" required/>
              <input type="text" name="email" placeholder="Email" required/>
              <input type="text" name="no_hp" placeholder="Nomor Handphone" required/>
              <input type="text" name="jumlah" placeholder="Jumlah Dana"required />
              <input type="date" name="tanggal" placeholder="Tanggal" required />
              <label>Foto Kejadian</label>
              <input type="file" id="filenameFoto" class="unggah" name="filenameFoto"/>
              <label>Surat Pernyataan</label>
              <input type="file" id="filenameSP" class="unggah" name="filenameSP"/>
              <label>Deskripsi Kejadian</label>
              <input type="file" id="filenameDK" class="unggah" name="filenameDK">
              <input type="submit" name="ajukan" value="Ajukan" />
			  </form>
			  <?php
				if (isset($_POST['ajukan'])){
					$allowedFoto = array('png', 'jpg');
					$filenameFoto = $_FILES['filenameFoto']['name'];
					$extFoto = pathinfo($filenameFoto, PATHINFO_EXTENSION);
					if (in_array($extFoto, $allowedFoto)) {
						if ($_FILES["filenameFoto"]["size"] > 200000) {
						  echo "<script>alert('File Foto maksimal 200kb');</script>";
						}else{
							$foto = "file/fk/".$_FILES["filenameFoto"]["name"];
							if (move_uploaded_file($_FILES["filenameFoto"]["tmp_name"], $foto)){
								
								$allowedSP = array('doc', 'docx', 'pdf');
								$filenameSP = $_FILES['filenameSP']['name'];
								$extSP = pathinfo($filenameSP, PATHINFO_EXTENSION);
								if (in_array($extSP, $allowedSP)) {
									if ($_FILES["filenameSP"]["size"] > 1000000) {
									  echo "<script>alert('File surat pernyataan maksimal 1mb');</script>";
									}else{
										$sp = "file/sp/".$_FILES["filenameSP"]["name"];
										if (move_uploaded_file($_FILES["filenameSP"]["tmp_name"], $sp)){
										$filenameDK = $_FILES['filenameDK']['name'];
										$extDK = pathinfo($filenameDK, PATHINFO_EXTENSION);
										if (in_array($extDK, $allowedSP)) {
											if ($_FILES["filenameDK"]["size"] > 1000000) {
											  echo "<script>alert('File deskripsi kejadian maksimal 1mb');</script>";
											}else{
												$dk = "file/dk/".$_FILES["filenameDK"]["name"];
												if (move_uploaded_file($_FILES["filenameDK"]["tmp_name"], $dk)){
												$q = $koneksi->query("INSERT INTO data_pengajuan (id_pengaju, judul, email, no_hp, dana, tanggal_kejadian, foto_kejadian, surat_pernyataan, deskripsi_kejadian, verifikasi, waktu_pengajuan) values ('".$getUserLogin['id']."', '".$_POST['judul']."', '".$_POST['email']."', '".$_POST['no_hp']."', '".$_POST['jumlah']."', '".$_POST['tanggal']."', '".$foto."', '".$sp."', '".$dk."', '0', CURRENT_TIMESTAMP)");
												if ($q){
													$_SESSION['ajukan'] = 1;
													header('location: Verifikasi.php');
												}else{
													echo $koneksi->error;
												}
											}
											}
										}else{
											echo "<script>alert('File Deskripsi kejadian harus berupa .doc, .docx, atau .pdf');</script>";
										}
									}
									}
								}else{
									echo "<script>alert('File Surat pernyataan harus berupa .doc, .docx, atau .pdf');</script>";
								}
								
							}
						}
					}else{
						echo "<script>alert('File Foto harus berupa gambar');</script>";
					}
				}
			  ?>
            </div> 
    </body>
</html> 