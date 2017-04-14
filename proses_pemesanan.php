<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	session_start();
	
	$nama_penerima = $_POST["nama_penerima"];
	$nomor_telepon = $_POST["nomor_telepon"];
	$alamat = $_POST["alamat"];
	$nama_kota = $_POST["nama_kota"];
	
	$id_user = $_SESSION['id_user'];
	$waktu_saat_ini = date("Y-m-d H:i:s");
	
	$query = mysqli_query($koneksi, "INSERT INTO tb_pesanan (nama_penerima, id_user, nomor_telepon, id_kota, alamat, tanggal_pemesanan, status)
												VALUES ('$nama_penerima', '$id_user', '$nomor_telepon', '$nama_kota', '$alamat', '$waktu_saat_ini', '0')");
												
	if($query){
		$last_pesanan_id = mysqli_insert_id($koneksi);
		
		$keranjang = $_SESSION['keranjang'];
		
		foreach($keranjang AS $key => $value){
			$id_barang = $key;
			$quantity = $value['quantity'];
			$harga = $value['harga'];
			
			mysqli_query($koneksi, "INSERT INTO tb_detail_pesanan(id_pesanan, id_barang, quantity, harga)
												   VALUES ('$last_pesanan_id', '$id_barang', '$quantity', '$harga')");
		}
		
		unset($_SESSION["keranjang"]);
		
		header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&id_pesanan=$last_pesanan_id");
	}
?>	