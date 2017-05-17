<?php
$cari		= $_POST['cari'];
$query	= mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE STATUS='on' AND nama_barang LIKE '%$cari%'");
echo "$cari";
 ?>

<div id="kiri">
	<?php

		echo kategori($id_kategori);

	?>
</div>

<div id="kanan">


	<div id="frame-barang">

		<ul>
			<?php

				if(mysqli_num_rows($query)>0){
					$no=1;
					while($row=mysqli_fetch_assoc($query)){

						$style=false;
						if($no == 4){
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

				}else{
					echo "Tidak ada barang yang cocok";
				}



		?>

</div>
