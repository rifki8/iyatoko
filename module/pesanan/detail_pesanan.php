<?php
  $id_pesanan = $_GET["id_pesanan"];

  $query = mysqli_query($koneksi, "SELECT tb_pesanan.nama_penerima, tb_pesanan.nomor_telepon,
    tb_pesanan.alamat, tb_pesanan.tanggal_pemesanan, tb_user.nama_user, tb_kota.nama_kota,
    tb_kota.tarif FROM tb_pesanan JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user
    JOIN tb_kota ON tb_kota.id_kota=tb_pesanan.id_kota WHERE tb_pesanan.id_pesanan='$id_pesanan'");

    $row=mysqli_fetch_assoc($query);

    $tanggal_pemesanan = $row['tanggal_pemesanan'];
    $nama_penerima = $row['nama_penerima'];
    $nomor_telepon = $row['nomor_telepon'];
    $alamat = $row['alamat'];
    $tarif = $row['tarif'];
    $nama_user = $row['nama_user'];
    $nama_kota = $row['nama_kota'];
?>

<div id="frame-faktur">

  <h3><center>Detail Pesanan</center></h3>

  <hr/>

  <table>

    <tr>
      <td>Nomor Faktur</td>
      <td>:</td>
      <td><?php echo $id_pesanan; ?></td>
    </tr>
    <tr>
      <td>Nama Pemesan</td>
      <td>:</td>
      <td><?php echo $nama_user; ?></td>
    </tr>
    <tr>
      <td>Nama Penerima</td>
      <td>:</td>
      <td><?php echo $nama_penerima; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td>:</td>
      <td><?php echo $nomor_telepon; ?></td>
    </tr>
    <tr>
      <td>Tanggal Pemesanan</td>
      <td>:</td>
      <td><?php echo $tanggal_pemesanan; ?></td>
    </tr>

  </table>

</div>

  <table class="table-list">

    <tr class="baris-title">
      <th class="no">No</th>
      <th class="kiri">Nama Barang</th>
      <th class="tengah">Qty</th>
      <th class="kanan">Harga Satuan</th>
      <th class="kanan">Total</th>
    </tr>

    <?php
      $queryDetail = mysqli_query($koneksi,"SELECT tb_detail_pesanan.*, tb_barang.nama_barang
        FROM tb_detail_pesanan JOIN tb_barang ON tb_detail_pesanan.id_barang=tb_barang.id_barang
        WHERE tb_detail_pesanan.id_pesanan='$id_pesanan'");

        $no = 1;
        $subtotal = 0;
        while ($rowDetail=mysqli_fetch_assoc($queryDetail)) {

          $total = $rowDetail["harga"] * $rowDetail["quantity"];
          $subtotal = $subtotal + $total;

          echo "<tr>
                  <td class='no'>$no</td>
                  <td class='kiri'>$rowDetail[nama_barang]</td>
                  <td class='tengah'>$rowDetail[quantity]</td>
                  <td class='kanan'>".rupiah($rowDetail["harga"])."</td>
                  <td class='kanan'>".rupiah($total)."</td>
                </tr>";

          $no++;
        }

        $subtotal = $subtotal + $tarif;
    ?>

    <tr>
      <td class="kanan" colspan="4">Biaya Pengiriman</td>
      <td class="kanan"><?php echo rupiah($tarif); ?></td>
    </tr>

    <tr>
      <td class="kanan" colspan="4"><b>Sub Total</b></td>
      <td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
    </tr>

  </table>

  <div id="frame-keterangan-pembayaran">
    <p>Silahkan lakukan pembayaran ke Bank GA<br/>
       Nomor Account : 1234-4321-0000 (A/N Iyatoko).<br/>
       Setelah melakuakan pembayaran silahkan lakuakan konfiramasi pembayaran
       <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&id_pesanan=$id_pesanan"?>">Disini</a>.
    </p>
  </div>
