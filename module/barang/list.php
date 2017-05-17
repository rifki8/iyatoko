<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="tombol-action">+ Tambah Barang</a>
</div>

<?php

	$query = mysqli_query($koneksi, "SELECT tb_barang.*, tb_kategori.nama_kategori, tb_supplier.* FROM tb_barang JOIN tb_kategori ON tb_barang.id_kategori=tb_kategori.id_kategori JOIN tb_supplier ON tb_supplier.id_supplier=tb_barang.id_supplier  ORDER BY nama_barang ASC");

	if (mysqli_num_rows($query) == 0) {
		echo "<h3>Saat ini belum ada barang di dalam tabel barang</h3>";
	}else{

		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Barang</th>
				<th class='kiri'>Supplier</th>
				<th class='kiri'>Kategori</th>
				<th class='kiri'>Harga</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			  </tr>";

		$no=1;
		while ($row=mysqli_fetch_assoc($query)) {

			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[nama_barang]</td>
					<td class='kiri'>$row[nama_supplier]</td>
					<td class='kiri'>$row[nama_kategori]</td>
					<td class='kiri'>".rupiah($row["harga"])."</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&id_barang=$row[id_barang]'>Edit</a>
					</td>
				  </tr>";

			$no++;
		}
		echo "</table>";

	}
?>
