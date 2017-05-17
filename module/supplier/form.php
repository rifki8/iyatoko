<?php

	$id_supplier = isset($_GET['id_supplier']) ? $_GET['id_supplier'] : false;

	$nama_supplier = "";
	$no_telp = "";
	$email = "";
	$status = "";
	$alamat = "";
	$button = "Add";

	if($id_supplier){
		$querySupplier = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier='$id_supplier'");
		$row = mysqli_fetch_assoc($querySupplier);

		$nama_supplier = $row['nama_supplier'];
		$no_telp = $row['nomor_telepon'];
		$email = $row['email'];
		$alamat = $row['alamat'];
		$status = $row['status'];
		$button = "Update";
	}

?>
<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/supplier/action.php?id_supplier=$id_supplier"; ?>" method="POST">

	<div class="element-form">
		<label>Supplier</label>
		<span><input type="text" name="nama_supplier" value="<?php echo $nama_supplier; ?>" /></span>
	</div>

	<div style="margin-bottom:10px;">
		<label style="font-weight:bold;">Alamat</label>
		<span><textarea name="alamat" id="editor"><?php echo $alamat; ?></textarea></span>
	</div>

	<div class="element-form">
		<label>Nomor Telepon</label>
		<span><input type="text" name="nomor_telepon" value="<?php echo $no_telp; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Email</label>
		<span><input type="email" name="email_supplier" value="<?php echo $email; ?>" /></span>
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
