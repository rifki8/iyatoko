<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    $id_user = $_GET['id_user'];

    $nama_user = $_POST['nama_user'];
	  $email = $_POST["email"];
	  $level = $_POST["level"];
	  $status = $_POST["status"];

	mysqli_query($koneksi, "UPDATE tb_user SET nama_user='$nama_user',
											   email='$email',
											   level='$level',
											   status='$status'
											   WHERE id_user='$id_user'");

    header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
?>
