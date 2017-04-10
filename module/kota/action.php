<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    $nama_kota = $_POST['nama_kota'];
    $tarif = $_POST['tarif'];
    $status = $_POST['status'];
    $button = $_POST['button'];

	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO tb_kota (nama_kota, tarif, status) VALUES('$nama_kota', '$tarif', '$status')");
	}
	else if($button == "Update"){
		$id_kota = $_GET['id_kota'];

		mysqli_query($koneksi, "UPDATE tb_kota SET nama_kota='$nama_kota',
												tarif='$tarif',
												status='$status' WHERE id_kota='$id_kota'");
	}

	header("location:" .BASE_URL."index.php?page=my_profile&module=kota&action=list");
