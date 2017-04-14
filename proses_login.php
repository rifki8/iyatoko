<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$email_user		= $_POST['email_user'];
	$password	= md5($_POST['password']);

	$query = mysqli_query($koneksi, "SELECT * FROM tb_user where email_user='$email_user' AND password='$password' AND status='on'");

	if (mysqli_num_rows($query) == 0){

		header("location: ".BASE_URL."index.php?page=login&notif=true");

	}

	else{

		$row = mysqli_fetch_assoc($query);

		session_start();

		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['nama_user'] = $row['nama_user'];
		$_SESSION['level_user'] = $row['level_user'];

		if(isset($_SESSION["proses_pesanan"])){
			header("location: ".BASE_URL."index.php?page=data_pemesan");
		}else{		
			header("location: ".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
		}
	}

?>
