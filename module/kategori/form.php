<?php

	$id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;

	$nama_kategori = "";
	$status = "";
	$button = "Add";

	if($id_kategori){
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori'");
		$row = mysqli_fetch_assoc($queryKategori);

		$nama_kategori = $row['nama_kategori'];
		$status = $row['status'];
		$button = "Update";
	}

?>
<form action="<?php echo BASE_URL."module/kategori/action.php?id_kategori=$id_kategori"; ?>" method="POST">

	<div class="element-form">
		<label>Kategori</label>
		<span><input type="text" name="nama_kategori" value="<?php echo $nama_kategori; ?>" /></span>
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
