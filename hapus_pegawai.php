<?php
session_start();
$sesion = $_SESSION['role_pegawai'];
if (isset($_SESSION['login'])) {
    if ($sesion == 'staff') {
        exit('<h1>Access is Denied !!</h1>');
    }
} else {
    header('location:login.php');
}
require 'functions.php';

$id = $_GET["nip"];
if (hapus_pegawai($id) > 0) {
    echo ' <script> alert("data berhasil di hapus !");
    document.location.href= "pegawai.php";
    </script>';
} else {
    echo '<script> alert("data gagal di hapus !");
     document.location.href= "pegawai.php";
    </script>';
}