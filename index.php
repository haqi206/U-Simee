<?php
session_start();
include 'conf/koneksi.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/Dashboardutama.css">
		<link href= "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div>
                <h1 >We're Together</h1>
                <p>With us you can help everybody</p>
            </div>
        </div>

        <div class="navbar">
            <img class="logo" src="image/sime.png" height="20%" width="20%" alt="logo">
            <nav>
                <ul class="nav1">
                    <li><a href="Tentangkami.php">Tentang Kami</a></li>
                    <li><a href="Bantuan.php">Bantuan</a></li>
					<?php
					if (!empty($_SESSION['username'])){
						echo '<li><a href="Pengajuan.php">Pengajuan Dana</a></li>';
						echo '<li><a href="logout.php">Logout ('.$_SESSION['username'].')</a></li>';
					}
				?>
                </ul>
            </nav>
            <?php
				if (empty($_SESSION['username'])){
					echo '<a class="button1" href="Daftar.php"><button>Daftar</button></a>
					<a class="button2" href="Login.php"><button>Masuk</button></a>';
				}
			?>
        </div>
       
        <div class="Info">
            <span class="tutup" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Info!</strong> Lakukan pendaftaran untuk pengajuan dana. 
          </div>

        <div class="mainbody">
            
			<?php
				$q = $koneksi->query("SELECT * FROM data_pengajuan where verifikasi='1' ORDER BY rand() LIMIT 4 ");
				while($r = $q->fetch_assoc()){
					echo '<div class="card">
                <div class="image">
                    <img src="'.$r['foto_kejadian'].'" width="300px" height="125px">
                </div>
                <div class="Judul"> 
                    <h1 style="font-size:20px; text-align: center;">'.$r['judul'].'</h1>
                </div>
                <div class="deskripsi">
                    <p>DESKRIPSI</p>
                    <a href="Donasi.php?id='.$r['id'].'"> <button id="btn1">Donasi</button></a>
                </div>
            </div>';
				}
			?>
			
            </div>
        </div>

        <div class="slideshow">
            <div class="slide" style="background-image: url('image/awan.jpg'); ">
              <q>Tidaklah sedekah itu mengurangi harta.</q>
              <p class="author">- HR. Muslim</p>
            </div>

            <div class="slide" style="background-image: url('image/daungugur.jpg'); ">
                <q>Senyummu di hadapan saudaramu (sesama muslim) adalah bernilai sedekah bagimu</q>
                <p class="author">- HR. Tirmidzi</p>
              </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            </div>
        </div>
        <script>
             var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("slide");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
        </script>
       <div class="bg-img">
        <form action="#" class="kotaksaran">
          <h1>Saran</h1>
          <label for="nama"><b>Nama</b></label>
          <input type="text" placeholder="Masukkan Nama" name="nama" required>
          <label for="saran"><b>Saran</b></label>
          <input type="textarea" placeholder="Masukan Saran" name="saran" required>
          <input type="submit" class="btn_saran">
        </form>
      </div>
        <div class="fixed-footer">© copyright U-simee</div>
    </body>
</html>+