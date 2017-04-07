<div id="kiri">

	<?php
	
		echo kategori($id_kategori);
		
	?>
	
</div>

<div id="kanan">
	<?php
		$id_barang = $_GET['id_barang'];

		$query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang' AND status='on'");
		$row = mysqli_fetch_assoc($query);

		echo "<div id='detail-barang'>
					<h2>$row[nama_barang]</h2>
					<div id='frame-gambar'>
						<img src='".BASE_URL."images/barang/$row[gambar]' />
					</div>
					<div id='frame-harga'>
						<span>".rupiah($row['harga'])."</span>
						<a href='".BASE_URL."tambah_keranjang.php?id_barang=$row[id_barang]'>+ add to cart</a>
					</div>	
					<div id='keterangan'>		
						<b>Keterangan : </b> $row[spesifikasi]
					</div>
				</div>"; 
	?>
</div>