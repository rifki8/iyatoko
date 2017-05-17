<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=supplier&action=form"; ?>" class="tombol-action">+ Tambah Supplier</a>
</div>

<?php

	$querySupplier = mysqli_query($koneksi, "SELECT * FROM tb_supplier");

	if (mysqli_num_rows($querySupplier) == 0) {
		echo "<h3>Saat ini belum ada nama supplier di dalam tabel supplier</h3>";
	}else{

		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Supplier</th>
				<th class='kiri'>No. Telp</th>
				<th class='kiri'>Email</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			  </tr>";

		$no=1;
		while ($row=mysqli_fetch_assoc($querySupplier)) {

			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[nama_supplier]</td>
					<td class='kiri'>$row[nomor_telepon]</td>
					<td class='kiri'>$row[email]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=supplier&action=form&id_supplier=$row[id_supplier]'>Edit</a>
					</td>
				  </tr>";

			$no++;
		}
		echo "</table>";

	}
?>
