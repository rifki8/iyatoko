<div id="kiri">
	<?php
	
		echo kategori($id_kategori);
		
	?>
</div>

<div id="kanan">
	
		 <div id="slides">
		 
			<?php
			
				$queryBanner = mysqli_query($koneksi, "SELECT * FROM tb_slider WHERE status='on' ORDER BY id_slider DESC LIMIT 3");
				while($rowBanner=mysqli_fetch_assoc($queryBanner)){
					echo "<a href='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."images/slide/$rowBanner[gambar]' /></a>";
				}
			?>
		 
		 </div>
	
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