<?php
	$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
	$nama_penerima = isset($_GET['nama_penerima']) ? $_GET['nama_penerima'] : false;
	$nomor_telepon = isset($_GET['nomor_telepon']) ? $_GET['nomor_telepon'] : false;
	$nama_kota = isset($_GET['nama_kota']) ? $_GET['nama_kota'] : false;
	$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

	if($id_user == false){
		$_SESSION["proses_pesanan"] = true;

		header("location: ".BASE_URL."index.php?page=login");
		exit;
	}
	if($notif=="require"){
		echo "<div class='notif' style='text-align:center'> Maaf, kamu harus melengkapi semua form dibawah ini </div>";
	}
?>

<div id="frame-data-pengiriman">

	<h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>

	<div id="frame-form-pengiriman">

		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">

			<div class="element-form">
				<label>Nama Penerima</label>
				<span><input type="text" name="nama_penerima" value="<?php echo $nama_penerima ?>"/></span>
			</div>

			<div class="element-form">
				<label>Nomor Telepon</label>
				<span><input type="text" name="nomor_telepon" value="<?php echo $nomor_telepon ?>"/></span>
			</div>

			<div class="element-form">
				<label>Alamat Pengiriman</label>
				<span><textarea name="alamat" ><?php echo $alamat ?></textarea></span>
			</div>

			<div class="element-form">
				<label>Kota</label>
				<span>
					<select name="nama_kota">
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM tb_kota");

							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[id_kota]'>$row[nama_kota] (".rupiah($row["tarif"]).")</option>";
							}
						?>
					</select>
				</span>
			</div>

			<div class="element-form">
				<span><input type="submit" value="submit" /></span>
			</div>

		</form>
	</div>
</div>

<div id="frame-data-detail">
	<h3 class="label-data-pengiriman">Detail Order</h3>

	<div id="frame-detail-order">

		<table class="table-list">
			<tr>
				<th class='kiri'>Nama Barang</th>
				<th class='tengah'>Qty</th>
				<th class='kanan'>Total</th>
			</tr>

			<?php
				$subtotal = 0;
				foreach($keranjang AS $key => $value){

					$id_barang = $key;

					$nama_barang = $value['nama_barang'];
					$harga = $value['harga'];
					$quantity = $value['quantity'];

					$total = $quantity * $harga;
					$subtotal = $subtotal + $total;

					echo "<tr>
							<td class='kiri'>$nama_barang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
				}
				echo "<tr>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					 </tr>";

			?>

		</table>

	</div>
</div>
