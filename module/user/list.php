<?php
    $no=1;

    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM tb_user ORDER BY nama_user ASC");

    if(mysqli_num_rows($queryAdmin) == 0)
    {
        echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
    }
    else
    {
        echo "<table class='table-list'>";

            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Email</th>
                    <th class='kiri'>Level</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                 </tr>";

            while($rowUser=mysqli_fetch_array($queryAdmin))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[nama_user]</td>
                        <td>$rowUser[email_user]</td>
                        <td>$rowUser[level_user]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&id_user=$rowUser[id_user]"."'>Edit</a></td>
                     </tr>";

                $no++;
            }

        echo "</table>";
    }
?>
