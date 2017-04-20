<?php

	session_start();

	unset($_SESSION['id_user']);
	unset($_SESSION['nama_user']);
	unset($_SESSION['level_user']);
	header("location: index.php");

?>
