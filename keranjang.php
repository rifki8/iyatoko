<?php



if (count($keranjang) == 0) {
  echo "<h3>Saat ini belum ada barang di dalam keranjang belanja anda</h3>";
}else {

  $no=1;

  echo "<table class='table-list'>
          <tr class='baris-title'>
            <th class='tengah'>No</th>
            <th class='kiri'>Image</th>
            <th class='kiri'>Nama</th>
            <th class='tengah'>Qty</th>
            <th class='kanan'>Harga Satuan</th>
            <th class='kanan'>Total</th>
          </tr>";

          $key="";
          $subtotal = 0;
        if (is_array($keranjang)||is_object($key)) {

          foreach($keranjang AS $key => $value){
            $id_barang = $key;

            $nama_barang = $value["nama_barang"];
            $harga = $value["harga"];
            $gambar = $value["gambar"];
            $quantity = $value["quantity"];

            $total = $quantity * $harga;
            $subtotal = $subtotal + $total;

    echo "<tr>
            <td class='tengah'>$no</td>
            <td class='kiri'><img src='".BASE_URL."images/barang/$gambar' height='100px' /></td>
            <td class='kiri'>$nama_barang</td>
            <td class='tengah'><input type='number' name='$id_barang' value='$quantity' class='update-quantity'</td>
            <td class='kanan'>".rupiah($harga)."</td>
            <td class='kanan hapus_item'>".rupiah($total)."<a href='".BASE_URL."hapus_item.php?id_barang=$id_barang' >x</a></td>
          </tr>";

        $no++;
}
}
    echo "<tr>
            <td colspan='5' class='kanan'><b>Sub Total</b></td>
            <td class='kanan'><b>".rupiah($subtotal)."</b></td>
          </tr>";

    echo "</table>";

    echo "<div id='frame-button-keranjang'>
            <a id='lanjut-belanja' href='".BASE_URL."index.php'>< Lanjut Belanja</a>
            <a id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesan'>Lanjut Pemesanan ></a>
          </div>";

}
 ?>

<script>

  $(".update-quantity").on("input", function(e){
    var id_barang = $(this).attr("name");
    var value = $(this).val();

  $.ajax({
    method : "POST",
    url : "update_keranjang.php",
    data: "id_barang="+id_barang+"&value="+value
  })
  .done(function(data){
    location.reload();
  });
});

</script>
