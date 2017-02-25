<div id="kiri">
	<div id="menu-kategori">

		<ul>

			<?php

				$query = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE status='on'");

				while($row=mysqli_fetch_assoc($query)){

					echo"<li><a href='".BASE_URL."index.php?id_kategori=$row[id_kategori]'>$row[nama_kategori]</a></li>";

				}
			?>
		</ul>
	</div>
</div>

<div id="kanan">

<div id="frame-barang">

	<ul>
		<?php

			if($id_kategori){
				$query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE status='on' AND id_kategori='$id_kategori' ORDER BY rand() DESC LIMIT 9");
			}else{
				$query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");

			}

			$no=1;
			while($row=mysqli_fetch_assoc($query)){

				$style=false;
				if($no == 3){
					$style="style='margin-right:0px'";
					$no=0;
				}

				echo "<li $style>
						<p class='price'>".rupiah($row['harga'])."</p>
						<a href='".BASE_URL."index.php?page=detail&id_barang=$row[id_barang]'>
							<img src='".BASE_URL."images/barang/$row[gambar]' />
						</a>
						<div class='keterangan-gambar'>
							<p><a href='".BASE_URL."index.php?page=detail&id_barang=$row[id_barang]'>$row[nama_barang]</a><p>
							<span>Stok : $row[stok]</span>
						</div>
						<div class='button-add-cart'>
							<a href='".BASE_URL."tambah_keranjang.php?id_barang=$row[id_barang]'>+ add to cart</a>
						</div>";

				$no++;
			}

		?>

</div>
