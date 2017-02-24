<?php

	if($id_user){
		header("location: ".BASE_URL);
	}

?>

<div id="container-user-akses">
	<form action="<?php echo BASE_URL."proses_daftar.php"; ?>" method="POST">

	<?php
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
		$nama_user = isset($_GET['nama_user']) ? $_GET['nama_user'] : false;
		$email_user = isset($_GET['email_user']) ? $_GET['email_user'] : false;

		if($notif=="require"){
			echo "<div class='notif'> Maaf, kamu harus melengkapi semua form dibawah ini </div>";
		}

		elseif($notif=="password"){
			echo "<div class='notif'> Maaf, password yang kamu masukkan tidak sama </div>";
		}

		elseif($notif=="email_user"){
			echo "<div class='notif'> Maaf, email yang kamu masukkan sudah terdaftar </div>";
		}
	?>

		<div class="element-form">
			<h1> Daftar Sekarang</h1>
		</div>

		<div class="element-form">
			<!--<label>Nama Lengkap</label>-->
			<span><input type="text" name="nama_user" value="<?php echo $nama_user; ?>" placeholder="Nama Lengkap"></span>
		</div>

		<div class="element-form">
			<!--<label>Email</label>-->
			<span><input type="text" name="email_user" value="<?php echo $email_user; ?>" placeholder="Email"></span>
		</div>

		<div class="element-form">
			<!--<label>Password</label>-->
			<span><input type="password" name="password" placeholder="Password"></span>
		</div>

		<div class="element-form">
			<!--<label>Re-type Password</label>-->
			<span><input type="password" name="re_password" placeholder="Masukkan Ulang Password"></span>
		</div>

		<div class="element-form" align="right">
			<span><input type="submit" value="Daftar"></span>
		</div>

	</form>
</div>
