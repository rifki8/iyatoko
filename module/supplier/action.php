<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");

	$nama_supplier = $_POST['nama_supplier'];
	$alamat = $_POST['alamat'];
	$nomor_telepon = $_POST['nomor_telepon'];
	$email_supplier = $_POST['email_supplier'];
	$status = $_POST['status'];
	$button = $_POST['button'];

	if($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO tb_supplier (id_supplier, nama_supplier, alamat, nomor_telepon, email, status) VALUES (NULL,'$nama_supplier', '$alamat', '$nomor_telepon', '$email_supplier', '$status')");
	}elseif ($button == "Update") {
		$id_supplier = $_GET['id_supplier'];

		mysqli_query($koneksi, "UPDATE tb_supplier SET nama_supplier='$nama_supplier', alamat='$alamat', nomor_telepon='$nomor_telepon', email='$email', status='$status' WHERE id_supplier='$id_supplier'");
	}

	header("location:".BASE_URL."index.php?page=my_profile&module=supplier&action=list");
?>
