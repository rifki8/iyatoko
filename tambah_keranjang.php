<?php
  include_once("function/koneksi.php");
  include_once("function/helper.php");

  session_start();

  $id_barang = $_GET['id_barang'];
  $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

  $query = mysqli_query($koneksi, "SELECT nama_barang, gambar, harga FROM tb_barang WHERE id_barang='$id_barang'");
  $row = mysqli_fetch_assoc($query);

  $keranjang[$id_barang] = array('nama_barang' => $row['nama_barang'],
                                  'gambar' => $row['gambar'],
                                  'harga' => $row['harga'],
                                  'quantity' => 1);

  $_SESSION['keranjang'] = $keranjang;

  header("location:".BASE_URL);

 ?>
