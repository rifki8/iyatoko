<?php
include "connect.php";
$nama= $_POST['nama']; //get the nama value from form
$q = "SELECT * from tb_barang where nama like '%$nama%' "; //query to get the search result
$result = mysql_query($q); //execute the <?php
include "connect.php";
$nama= $_POST['nama']; //get the nama value from form
$q = "SELECT * from tb_barang where nama like '%$nama%' "; //query to get the search result
$result = mysql_query($q); //execute the query $q
echo "<center>";
echo "<h2> Hasil Searching </h2>";
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "
<tr bgcolor='orange'>
<td>ID BARANG</td>
<td>NAMA BARANG</td>
<td>HARGA</td>
</tr>";
while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
echo "
<tr>
<td>".$data['id_barang']."</td>
<td>".$data['nama']."</td>
<td>".$data['harga']."</td>
</tr>";
}
echo "</table>";
?>query $q
echo "<center>";
echo "<h2> Hasil Searching </h2>";
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "
<tr bgcolor='orange'>
<td>ID BARANG</td>
<td>NAMA BARANG</td>
<td>HARGA</td>
</tr>";
while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
echo "
<tr>
<td>".$data['id_barang']."</td>
<td>".$data['nama']."</td>
<td>".$data['harga']."</td>
</tr>";
}
echo "</table>";
?>