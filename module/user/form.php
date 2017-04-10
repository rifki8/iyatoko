<?php

  $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : "";

	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_user'");

	$row=mysqli_fetch_array($queryUser);

	$nama_user = $row["nama_user"];
	$email_user = $row["email_user"];
	$status = $row["status"];
	$level_user = $row["level_user"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?id_user=$id_user"?>" method="POST">

	<div class="element-form">
		<label>Nama Lengkap</label>
		<span><input type="text" name="nama_user" value="<?php echo $nama_user; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Email</label>
		<span><input type="text" name="email_user" value="<?php echo $email_user; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Level</label>
		<span>
			<input type="radio" value="superadmin" name="level_user" <?php if($level_user == "superadmin"){ echo "checked"; } ?> /> Superadmin
			<input type="radio" value="customer" name="level_user" <?php if($level_user == "customer"){ echo "checked"; } ?> /> Customer			
		</span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> on
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
	</div>
</form>
