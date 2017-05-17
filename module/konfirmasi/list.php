<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="tombol-action">+ Tambah Barang</a>
</div>

<?php

	$query = mysqli_query($koneksi, "SELECT * FROM tb_pesanan ORDER BY id_pesanan DESC");

	if (mysqli_num_rows($query) == 0) {
		echo "<h3>Saat ini belum ada barang di dalam tabel konfirmasi</h3>";
	}else{

		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='tengah'>ID Pesanan</th>
				<th class='kiri'>Nomor Rekening</th>
				<th class='tengah'>Nama Account</th>
				<th class='tengah'>Tanggal Transfrer</th>
			  </tr>";

		$no=1;
		while ($row=mysqli_fetch_assoc($query)) {

			echo "<tr>
					<td class='tengah'>$row[id_pesanan]</td>
					<td class='kiri'>$row[nomer_rekening]</td>
					<td class='tengah'>$row[nama_akun]</td>
					<td class='tengah'>$row[tanggal_transfer]</td>
				  </tr>";

			$no++;
		}
		echo "</table>";

	}
?>
