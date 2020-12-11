<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Simee</title>
		<link rel="stylesheet" type="text/css" href="css/Bantuan.css">
		<link href= "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar">
            <a href="index.php">Back</a>
          </div>
          <div class="blog">
              <div class="isi">
                <div class="row">
                    <div class="main">
                      <h2>Bantuan</h2>
                      <br>
                        <button type="button" class="dropdown">Bagaimana cara mengajukan dana?</button>
                        <div class="content">
                        <p>Anda dapat melakukan pengajuan dana dengan melakukan pendaftaran terlebih dahulu untuk menjaga kebenaran data</p>
                        </div>
                        <button type="button" class="dropdown">Apakah saya dapat menyumbang tanpa terdaftar?</button>
                        <div class="content">
                        <p>Anda dapat melakukan hal tersebut.</p>
                        </div>
                        <button type="button" class="dropdown">Adakah Contact yang bisa saya hubungi? </button>
                        <div class="content">
                        <p>E-mail = A.1mail@gmail.com</p>
                        </div>
                        <script>
                            var coll = document.getElementsByClassName("dropdown");
                            var i;
							var j;
                            
                            for (i = 0; i < coll.length; i++) {
                              coll[i].addEventListener("click", function() {
                                this.classList.toggle("active");
								for (j = 0; j < coll.length; j++) {
									var contents = document.getElementsByClassName("dropdown")[j].nextElementSibling;
									if (j !== i){
									  contents.style.display = "none";
									}
								}
                                var content = this.nextElementSibling;
                                if (content.style.display === "block") {
                                  content.style.display = "none";
                                } else {
                                  content.style.display = "block";
                                }
                              });
                            }
                            </script>
                    </div>
                  </div>
              </div>
          </div>
          
          <div class="footer">
            <p>© copyright U-simee</p>
          </div>
    </body>
</html>