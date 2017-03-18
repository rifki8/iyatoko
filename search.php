
<input type="search" name="search" id="search"/> <br/>
<br/><input type="submit" value="Search" name="search"/>

<?php
if(isset($_GET['search'])){
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("iyatoko");
	$idbarang = $_GET['id_barang'];
	$idkategori = $_GET['id_kategori'];
	$namabarang = $_GET['nama_barang'];
	$harga = $_GET['harga'];
	$sql = "select * from tb_barang where id_barang like '%".$_GET['search']."%' || nama_barang like '%".$_GET['search']."%'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		?>
		<table>
			<tr>
				<td>HASIL PENCARIAN</td>
			</tr>
			<?php
			while($siswa = mysql_fetch_array($result)){?>
		<tr>
		<td><?php echo $siswa['idbarang'];?></td>
		<td><?php echo $siswa['idkategori'];?></td>
		<td><?php echo $siswa['namabarang'];?></td>
		<td><?php echo $siswa['gambar'];?></td>
        <td><?php echo $siswa['harga'];?></td>
		</tr>
			<?php }?>
		</table><a href="index.php">index</a>
		<?php
	}else{
		echo 'Data not found!'; 
	}
}
?>
