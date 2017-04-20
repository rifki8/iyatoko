<?php

  $id_pesanan = $_GET["id_pesanan"];

  $query = mysqli_query($koneksi, "SELECT status FROM tb_pesanan WHERE id_pesanan='$id_pesanan'");
  $row=mysqli_fetch_assoc($query);
  $status = $row['status'];

?>
<form action="<?php echo BASE_URL."module/pesanan/action.php?id_pesanan=$id_pesanan"; ?>" method="POST">
  <div class="element-form">
    <label>Pesanan Id (Faktur Id)</label>
    <span><input type="text" value="<?php echo $id_pesanan; ?>" name="id_pesanan" readonly="true" /></span>
  </div>

  <div class="element-form">
    <label>Status</label>
    <span>
      <select name="status">
        <?php

          foreach ($arrayStatusPesanan AS $key => $value) {
            if ($status == $key) {
              echo "<option value='$key' selected='true'>$value</option>";
            }
            else {
              echo "<option value='$key'>$value</option>";
            }
          }

        ?>
      </select>
    </span>
  </div>

  <div class="element-form">
    <span><input class="tombol-action" type="submit" value="Edit Status" name="button" /></span>
  </div>

</form>
