<html>
</head>
	<title>Buku Tamu by TUTORIALWEB.NET</title>
	<style type="text/css">
		body { font-family:tahoma; font-size:12px; }
		#container { width:450px; padding:20px 40px; margin:50px auto; border:0px solid #555; box-shadow:0px 0px 2px #555; }
		input[type="text"] { width:200px; }
		input[type="text"], textarea { padding:5px; margin:2px 0px; border: 1px solid #777; }
		input[type="submit"], input[type="reset"] { padding: 5px 20px; margin:2px 0px; font-weight:bold; cursor:pointer; }
		#error { border:1px solid red; background:#ffc0c0; padding:5px; }
	</style>
</head>
<body>
 
	<div id="container">
		<h1>Buku Tamu</h1>
		<p>Silahkan isi buku tamu di bawah ini untuk meninggalkan pesan Anda!</p>
 
		<?php
		if($_POST['go']){
			mysql_connect("localhost", "root", "root");
			mysql_select_db("tutorial");
 
			$nama	= htmlentities(mysql_real_escape_string($_POST['nama']));
			$email	= htmlentities(mysql_real_escape_string($_POST['email']));
			$web	= htmlentities(mysql_real_escape_string($_POST['website']));
			$pesan	= htmlentities(mysql_real_escape_string($_POST['pesan']));
			$tgl	= time();
 
			if($nama && $email && $pesan){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$in = mysql_query("INSERT INTO bukutamu VALUES(NULL, '$tgl', '$nama', '$email', '$web', '$pesan')");
					if($in){
						echo '<script language="javascript">alert("Terima kasih, data Anda berhasil disimpan"); document.location="index.php";</script>';
					}else{
						echo '<div id="error">Uppsss...! Query ke database gagal dilakukan!</div>';
					}
				}else{
					echo '<div id="error">Uppsss...! Email Anda tidak valid!</div>';
				}
			}else{
				echo '<div id="error">Uppsss...! Lengkapi form!</div>';
			}
		}
		?>
 
		<form action="" method="post">
			<p><b>Nama Lengkap :</b><br><input type="text" name="nama" placeholder="Muhammad Ridwansyah" required /></p>
			<p><b>Email :</b><br><input type="text" name="email" placeholder="muhammadridwansyah0005@gmail.com" required /></p>
			<p><b>Website :</b><br><input type="text" name="website" placeholder="http://www.tutorialweb.net" /></p>
			<p><b>Pesan :</b><br><textarea name="pesan" rows="5" cols="50" placeholder="Hy, saya sangat senang bisa berkunjung" required></textarea></p>
			<p><input type="submit" name="go" value="Kirim" /> <input type="reset" name="del" value="Hapus" /></p>
		</form>
	</div>
 
</body>
</html>
