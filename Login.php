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
		<link rel="stylesheet" type="text/css" href="css/Login.css">
		
    </head>
    <body>
        <div class="login">
            <div class="konten">
              <h1>Login</h1>
			  <form action="" method="POST">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <label>Login sebagai admin<a href="adminlogin.php">klik di sini</a></label><br>
              <input type="submit" name="masuk" value="Masuk" />
			  </form>
			  <?php
				if (isset($_POST['masuk'])){
					$q = $koneksi->query("SELECT * FROM pengguna where username='".strtolower($_POST['username'])."'");
					if ($q->num_rows > 0){
						if($q->fetch_assoc()['password'] == $_POST['password']){
							$_SESSION['username'] = strtolower($_POST['username']);
							header('location: index.php');
						}else{
							echo "<script>alert('Username atau password tidak terdaftar');</script>";
						}
					}else{
						echo "<script>alert('Username atau password tidak terdaftar');</script>";
					}
				}
			  ?>
            </div> 
    </body>
</html> 