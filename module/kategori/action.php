<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");

	$kategori = $_POST['kategori'];
	$status = $_POST['status'];
	$button = $_POST['button'];

	if($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
	}elseif ($button == "Update") {
		$kategori_id = $_GET['kategori_id'];

		mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',
													status='$status' WHERE kategori_id='$kategori_id'");
	}

	header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
?>
