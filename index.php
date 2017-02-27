<?php

	session_start();

	include_once("function/helper.php");
	include_once("function/koneksi.php");

	//content dinamis
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;

	$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
	$nama_user = isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : false;
	$level_user = isset($_SESSION['level_user']) ? $_SESSION['level_user'] : false;

  ?>

<!DOCTYPE html>
<html>

	<head>
		<title>IYA toko | Cari semua kebutuhanmu</title>
	</head>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/style.css"; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/slider.css"; ?>">
	
	<script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>
	<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
	
		<script>
		$(function() {
			$('#slides').slidesjs({
				height: 350,
				play: { auto :true,
						interval : 3000
						},
				navigation : false
			});
		});
		</script>

	<body>

		<div  id="container">

			<!--header website-->
			<div id="header">

				<form>

					<table cellspacing="0" cellpadding="0">
						<tr>
							<!--logo-->
							<td width="250" align="center">
							<a href="index.php"><h1>IYA toko</h1</a>
							</td>

							<!--kolom input pencarian-->
							<td width="600" align="right">
							<input type="text" name="cari" size="75" placeholder="Cari apa ya ... ?" />
							</td>

							<!--tombol cari-->
							<td>
							<a href="#" id="tombol-cari">
								<img src="<?php echo BASE_URL."images/search.png"; ?>">
							</a>
							</td>

							<td width="100" align="right">
								<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="tombol-keranjang"><img src="<?php echo BASE_URL."images/cart.png"; ?>" ></a>
							</td>

							<td width='300' align='right'>

							<!--tombol login, daftar, my profile-->

							<?php

								if ($id_user) {
									echo "Hi <b> $nama_user </b>,
							<a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list' id='login'>My Profile</a>

							<a href='".BASE_URL."logout.php' id='daftar'>Logout</a>";
								}

								else{
									echo "
							<a href='".BASE_URL."index.php?page=login' id='login'>Login</a>

							<a href='".BASE_URL."index.php?page=daftar' id='daftar'>Daftar</a>";
								}

							 ?>



							</td>
						</tr>

					</table>

				</form>

			</div>

			<!--content website-->
			<div id="content">
			<!--content dinamis-->
			<?php

			$namafile = "$page.php";

			if (file_exists($namafile)){
				include_once($namafile);
			}
			else{
				include_once("main.php");
			}

			?>

			</div>

			<!--footer website-->
			<div id="footer">
				<p>Copyright&copy IYA toko 2017</p>
			</div>

		</div>

	</body>

</html>
