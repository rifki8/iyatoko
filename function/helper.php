<?php
	//Konstata "BASE_URL"
	define("BASE_URL","http://localhost/iyatoko/");

	function rupiah($nilai = 0){
		$string = "Rp, ". number_format($nilai);
		return $string;
	}
	
	function kategori($id_kategori = false) {
		global $koneksi;
			
			$string = "<div id='menu-kategori'>";
			
			
				$string .= "<ul>";

					$query = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE status='on'");

					while($row=mysqli_fetch_assoc($query)){
						if($id_kategori == $row['id_kategori']){
							$string .= "<li><a href='".BASE_URL."index.php?id_kategori=$row[id_kategori]' class='active'>$row[nama_kategori]</a></li>";
						}else{
							$string .= "<li><a href='".BASE_URL."index.php?id_kategori=$row[id_kategori]'>$row[nama_kategori]</a></li>";
						}
					}
				
			$string .= "</ul>";
		$string .= "</div>";
	
		return $string;
	}
?>
