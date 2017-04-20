<?php

  if ($level_user == "superadmin") {
    $queryPesanan = mysqli_query($koneksi, "SELECT tb_pesanan.*, tb_user.nama_user FROM tb_pesanan JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user ORDER BY tb_pesanan.tanggal_pemesanan DESC");
  }else{
    $queryPesanan = mysqli_query($koneksi, "SELECT tb_pesanan.*, tb_user.nama_user FROM tb_pesanan JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user WHERE tb_pesanan.id_user='$id_user' ORDER BY tb_pesanan.tanggal_pemesanan DESC");
  }

  if(mysqli_num_rows($queryPesanan) == 0) {
    echo "<h3>Saat ini belum ada data pesanan</h3>";
  }
  else {

      echo "<table class='table-list'>
              <tr class='baris-title'>
                <th class='kiri'>Nomor Pesanan</th>
                <th class='kiri'>Status</th>
                <th class='kiri'>Nama</th>
                <th class='kiri'>Action</th>
              </tr>";

      $adminButton = "";
      while ($row=mysqli_fetch_assoc($queryPesanan)) {
        if ($level_user == "superadmin") {
            $adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&id_pesanan=$row[id_pesanan]'>Update Status</a>";
        }

        $status = $row['status'];
        echo "<tr>
                <td class='kiri'>$row[id_pesanan]</td>
                <td class='kiri'>$arrayStatusPesanan[$status]</td>
                <td class='kiri'>$row[nama_user]</td>
                <td class='kiri'>
                  <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail_pesanan&id_pesanan=$row[id_pesanan]'>Detail Pesanan</a>
                  $adminButton
                </td>
              </tr>";
      }

      echo "</table>";
  }
?>
