<?php

	$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
	$id_kategori="";
	$id_supplier="";
	$nama_barang = "";
	$gambar ="";
	$keterangan_gambar ="";
	$spesifikasi ="";
	$stok = "";
	$harga = "";
	$status = "";
	$button = "Add";

	if($id_barang){
		$querybarang = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
		$row = mysqli_fetch_assoc($querybarang);

		$nama_barang = $row['nama_barang'];
		$id_kategori = $row['id_kategori'];
		$id_supplier = $row['id_supplier'];
		$spesifikasi = $row['spesifikasi'];
		$gambar = $row['gambar'];
		$harga = $row['harga'];
		$stok = $row['stok'];
		$status = $row['status'];
		$button = "Update";
		$keterangan_gambar="(Klik \"Browse\" untuk mengganti gambar)";
		$gambar="<img src='".BASE_URL."/images/barang/$gambar' style='width: 200px; vertical-align: middle;'/>";
	}

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/barang/action.php?id_barang=$id_barang"; ?>" method="POST" enctype="multipart/form-data">

	<div class="element-form">
		<label>Kategori</label>
		<span>

			<select name="id_kategori">

				<?php
					$query = mysqli_query($koneksi,"SELECT id_kategori, nama_kategori FROM tb_kategori WHERE status='on' ORDER BY nama_kategori ASC");
					while ($row=mysqli_fetch_assoc($query)) {
						if (id_kategori == $row['id_kategori']) {
							echo "<option value='$row[id_kategori]' selected='true'>$row[nama_kategori]</option>";
						}
						else {
							echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
						}
					}
				 ?>

			</select>

		</span>
	</div>

	<div class="element-form">
		<label>Nama Barang</label>
		<span><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Suppier</label>
		<span>
				<select name="id_supplier">

					<?php
						$query = mysqli_query($koneksi,"SELECT id_supplier, nama_supplier FROM tb_supplier WHERE status='on' ORDER BY nama_supplier ASC");
						while ($row=mysqli_fetch_assoc($query)) {
							if (id_supplier == $row['id_supplier']) {
								echo "<option value='$row[id_supplier]' selected='true'>$row[nama_supplier]</option>";
							}
							else {
								echo "<option value='$row[id_supplier]'>$row[nama_supplier]</option>";
							}
						}
					 ?>

				</select>
	</span>
</div>
	<div style="margin-bottom:10px;">
		<label style="font-weight:bold;">Spesifikasi</label>
		<span><textarea name="spesifikasi" id="editor"><?php echo $spesifikasi; ?></textarea></span>
	</div>

	<div class="element-form">
		<label>Stok</label>
		<span><input type="text" name="stok" value="<?php echo $stok; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Harga</label>
		<span><input type="text" name="harga" value="<?php echo $harga; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Gambar Produk <?php echo $keterangan_gambar; ?></label>
		<span>
			<input type="file" name="file" /> <?php echo $gambar; ?>
		</span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" name="status" value="on"  <?php if($status == "on") { echo "checked='true'"; } ?> />On
			<input type="radio" name="status" value="off" <?php if($status == "off") { echo "checked='true'"; } ?>/>Off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
	</div>

</form>

<script>
CKEDITOR.replace("editor");
</script>
