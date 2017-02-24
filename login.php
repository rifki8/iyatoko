<?php

	if($id_user){
		header("location: ".BASE_URL);
	}

?>

<div id="container-user-akses">
	<form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">

	<?php

		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

		if($notif=="true"){
			echo "<div class='notif'> Maaf, email atau password yang kamu masukkan tidak cocok</div>";
		}

	?>

		<div class="element-form">
			<h1>Selamat Datang</h1>
		</div>

		<div class="element-form">
			<!--<label>Email</label>-->
			<span><input type="text" name="email_user" placeholder="Email"></span>
		</div>

		<div class="element-form">
			<!--<label>Password</label>-->
			<span><input type="password" name="password" placeholder="Password"></span>
		</div>
		<!--NEW
		<div class="checkbox">
			<span><input type="checkbox" name="rememberme">Remember Me</span>
	  </div>-->

		<div class="element-form" align="right">
			<span><input type="submit" value="Login"></span>
		</div>

	</form>

</div>
