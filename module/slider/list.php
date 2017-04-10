<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my_profile&module=slider&action=form"; ?>">+ Tambah Slider</a>
</div>

<?php
    $no=1;

    $querySlider = mysqli_query($koneksi, "SELECT * FROM tb_slider ORDER BY id_slider DESC");

    if(mysqli_num_rows($querySlider) == 0)
    {
        echo "<h3>Saat ini belum ada slider di dalam database</h3>";
    }
    else
    {
        echo "<table class='table-list'>";

            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Slider</th>
                    <th class='kiri'>Link</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
                 </tr>";

            while($rowSlider=mysqli_fetch_array($querySlider))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowSlider[nama_slider]</td>
                        <td><a target='blank' href='".BASE_URL."$rowSlider[link]'>$rowSlider[link]</a></td>
                        <td class='tengah'>$rowSlider[status]</td>
                        <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=slider&action=form&id_slider=$rowSlider[id_slider]"."'>Edit</a></td>
                     </tr>";

                $no++;
            }

        echo "</table>";
    }
?>
