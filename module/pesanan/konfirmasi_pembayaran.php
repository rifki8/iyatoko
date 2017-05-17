<?php

  $id_pesanan = $_GET["id_pesanan"];

?>

<table class="table-list">
  <form action="<?php echo BASE_URL."module/pesanan/action.php?id_pesanan=$id_pesanan"; ?>" method="POST">

    <div class="element-form">
      <label>Nomor Rekening</label>
      <span><input type="text" name="nomer_rekening" /></span>
    </div>

    <div class="element-form">
      <label>Nama Account</label>
      <span><input type="text" name="nama_akun" /></span>
    </div>

    <div class="element-form">
      <label>Tanggal Transfer (format: yyyy-mm-dd)</label>
      <span><input type="text" name="tanggal_transfer" /></span>
    </div>

    <div class="element-form">
      <span><input type="submit" value="Konfirmasi" name="button" /></span>
    </div>

  </form>
</table>
