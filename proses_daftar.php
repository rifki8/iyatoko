<?php
	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$level_user = "costumer";
	$status = "on";
	$nama_user = $_POST['nama_user'];
	$email_user = $_POST['email_user'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];

	unset($_POST['password']);
	unset($_POST['re_password']);
	$dataFrom = http_build_query($_POST);

	$query = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email_user = '$email_user'");

	if (empty($nama_user) || empty($email_user) || empty($password)) {

		header("location: ".BASE_URL."index.php?page=daftar&notif=require&$dataFrom");

	}

	elseif ($password != $re_password) {
		header("location: ".BASE_URL."index.php?page=daftar&notif=password&$dataFrom");
	}

	elseif (mysqli_num_rows($query) == 1) {
		header("location: ".BASE_URL."index.php?page=daftar&notif=email_user&$dataFrom");
	}

	else{

	$password = md5($password);

		mysqli_query($koneksi, "INSERT INTO tb_user (level_user, nama_user, email_user, password, status) VALUES ('$level_user', '$nama_user', '$email_user', '$password', '$status')");

		header("location: ".BASE_URL."index.php?page=login");
	}
?>
