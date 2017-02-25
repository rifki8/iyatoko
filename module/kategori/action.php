<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");

	$nama_kategori = $_POST['nama_kategori'];
	$status = $_POST['status'];
	$button = $_POST['button'];

	if($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO tb_kategori (nama_kategori, status) VALUES ('$nama_kategori', '$status')");
	}elseif ($button == "Update") {
		$id_kategori = $_GET['id_kategori'];

		mysqli_query($koneksi, "UPDATE tb_kategori SET nama_kategori='$nama_kategori',
													status='$status' WHERE id_kategori='$id_kategori'");
	}

	header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
?>
