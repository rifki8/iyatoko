<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");

	$id_kategori = $_POST['id_kategori'];
	$id_supplier = $_POST['id_supplier'];
	$nama_barang = $_POST['nama_barang'];
	$spesifikasi = $_POST['spesifikasi'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$update_gambar="";

	if (!empty($_FILES["file"]["name"])) {
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/".$nama_file);

		$update_gambar = ", gambar='$nama_file'";
		}

	if($button == "Add") {
		mysqli_query($koneksi, "INSERT INTO tb_barang (id_supplier, id_kategori, nama_barang, spesifikasi, gambar, harga, stok, status) VALUES ('$id_supplier', '$id_kategori', '$nama_barang', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
}

	elseif ($button == "Update") {
		$id_barang = $_GET['id_barang'];

		mysqli_query($koneksi, "UPDATE tb_barang SET id_supplier='$id_supplier', id_kategori='$id_kategori', nama_barang='$nama_barang', spesifikasi='$spesifikasi', harga='$harga', stok='$stok', status='$status' $update_gambar WHERE id_barang='$id_barang'");
	}

	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
?>
