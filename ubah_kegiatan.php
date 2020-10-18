<?php
session_start();
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
$sesion = $_SESSION['role_pegawai'];
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}


$id = $_GET['id'];
$data = query("SELECT * FROM kegiatan_pegawai WHERE id_kegiatan = $id")[0];

if (isset($_POST["ubahkegiatan"])) {

    if (ubahKegiatan($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Ubah !');
                document.location.href= 'input-kegiatan.php';
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
