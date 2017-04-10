<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    $nama_slider = $_POST['nama_slider'];
    $link = $_POST['link'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $edit_gambar = "";


    if($_FILES["file"]["name"] != "")
    {
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/slide/" . $nama_file);

        $edit_gambar  = ", gambar='$nama_file'";
    }

    if($button == "Add")
    {
        mysqli_query($koneksi, "INSERT INTO tb_slider (nama_slider, gambar, link, status) VALUES ('$nama_slider', '$nama_file', '$link', '$status')");
    }
    elseif($button == "Update")
    {
	    $id_slider = $_GET['id_slider'];

        mysqli_query($koneksi, "UPDATE tb_slider SET nama_slider='$nama_slider',
                                        $edit_gambar
                                        link='$link',
                                        status='$status'
										$edit_gambar WHERE id_slider='$id_slider'");
    }


    header("location: ".BASE_URL."index.php?page=my_profile&module=slider&action=list");
?>
