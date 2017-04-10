<?php

	$id_kota = isset($_GET['id_kota']) ? $_GET['id_kota'] : false;

	$nama_kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if($id_kota){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM tb_kota WHERE id_kota='$id_kota'");
		$row=mysqli_fetch_assoc($queryKota);

		$nama_kota = $row['nama_kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];

		$button = "Update";
	}

?>
<form action="<?php echo BASE_URL."module/kota/action.php?id_kota=$id_kota"?>" method="post">

	<div class="element-form">
		<label>Kota</label>
		<span><input type="text" name="nama_kota" value="<?php echo $nama_kota; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Tarif</label>
		<span><input type="text" name="tarif" value="<?php echo $tarif; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked"; } ?> /> Off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>

</form>
