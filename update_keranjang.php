<?php

  session_start();

  $keranjang = $_SESSION["keranjang"];
  $id_barang = $_POST["id_barang"];
  $value = $_POST["value"];

  $keranjang[$id_barang]["quantity"] = $value;

  $_SESSION["keranjang"] = $keranjang;
 ?>
