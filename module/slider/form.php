<?php

    $id_slider = isset($_GET['id_slider']) ? $_GET['id_slider'] : "";

    $nama_slider = "";
    $gambar = "";
    $link = "";
	  $keterangan_gambar = "";
    $status = "";

    $button = "Add";

    if($id_slider != "")
    {
        $button = "Update";

        $querySlider = mysqli_query($koneksi, "SELECT * FROM tb_slider WHERE id_slider='$id_slider'");
        $row=mysqli_fetch_array($querySlider);

		$nama_slider = $row["nama_slider"];
		$gambar = "<img src='". BASE_URL."images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
    $link = $row["link"];
		$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
		$status = $row["status"];
    }
?>

<form action="<?php echo BASE_URL."module/slider/action.php?id_slider=$id_slider"?>" method="post" enctype="multipart/form-data">

	<div class="element-form">
		<label>Slider</label>
		<span><input type="text" name="nama_slider" value="<?php echo $nama_slider; ?>" /></span>
	</div>

  <div class="element-form">
		<label>Gambar <?php echo $keterangan_gambar; ?></label>
		<span><input type="file" name="file" /><?php echo $gambar; ?></span>
	</div>

	<div class="element-form">
		<label>Link</label>
		<span><input type="text" name="link" value="<?php echo $link; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> Off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>
</form>
