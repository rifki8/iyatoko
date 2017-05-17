<?php
  include_once("../../function/koneksi.php");
  include_once("../../function/helper.php");

  session_start();

  $id_pesanan = $_GET['id_pesanan'];
  $button = $_POST['button'];

  if($button == "Konfirmasi") {
    $id_user = $_SESSION['id_user'];
    $nomer_rekening = $_POST['nomer_rekening'];
    $nama_akun = $_POST['nama_akun'];
    $tanggal_transfer = $_POST['tanggal_transfer'];

    $queryPembayaran = mysqli_query($koneksi, "UPDATE tb_pesanan SET status='1', nomer_rekening='$nomer_rekening', nama_akun='$nama_akun', tanggal_transfer='$tanggal_transfer' WHERE id_pesanan='$id_pesanan'");
    }


    else if($button == "Edit Status"){
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE tb_pesanan SET status='$status' WHERE id_pesanan='$id_pesanan'");

    if ($status == "2") {
      $query = mysqli_query($koneksi, "SELECT * FROM tb_detail_pesanan WHERE id_pesanan='$id_pesanan'");
      while ($row=mysqli_fetch_assoc($query)) {
        $id_barang = $row["id_barang"];
        $quantity = $row["quantity"];

        mysqli_query($koneksi, "UPDATE tb_barang SET stok=stok-$quantity WHERE id_barang='$id_barang'");
      }
    }
  }

  header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
?>
