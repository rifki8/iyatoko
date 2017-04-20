<?php
  include_once("../../function/koneksi.php");
  include_once("../../function/helper.php");

  session_start();

  $id_pesanan = $_GET['id_pesanan'];
  $button = $_POST['button'];

  if($button == "Konfirmasi") {
    $id_user = $_SESSION["id_user"];
    $nomor_rekening = $_POST["nomor_rekening"];
    $nama_account = $_POST["nama_account"];
    $tanggal_transfer = $_POST["tanggal_transfer"];

    $queryPembayaran = mysqli_query($koneksi, "INSERT INTO tb_konfirmasi_pembayaran(id_pesanan, nomor_rekening, nama_account, tanggal_transfer)
                                                                        VALUES('$id_pesanan', '$nomor_rekening', '$nama_account', '$tanggal_transfer')");

    if ($queryPembayaran) {
      mysqli_query($koneksi, "UPDATE tb_pesanan SET status='1' WHERE id_pesanan='$id_pesanan'");
    }

  }else if($button == "Edit Status"){
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
