<?php
session_start();
$u = "admin";
$p = "12345";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
		
    </head>
    <body>
        <div class="login">
            <div class="konten">
              <h1>Login Admin</h1>
			  <form action="" method="POST">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <input type="submit" name="masuk" value="Masuk" />
			  </form>
			  <?php
			  if (isset($_POST['masuk'])){
				if ($_POST['username'] != $u && $_POST['password'] != $p){
					echo "<script>alert('Username atau password salah');</script>";
				}else{
					$_SESSION['admin'] = 'admin';
					header('location: admin.php');
				}
			  }
			  ?>
            </div> 
    </body>
</html> 