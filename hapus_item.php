<?php

  include_once("function/helper.php");

  session_start();

  $id_barang = $_GET['id_barang'];
  $keranjang = $_SESSION['keranjang'];

  unset($keranjang[$id_barang]);

  $_SESSION['keranjang'] = $keranjang;

  header("location:".BASE_URL."index.php?page=keranjang");

 ?>
