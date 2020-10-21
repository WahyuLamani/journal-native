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

$nip = $_GET["nip"];
$passbaru = forgotPassword($nip);
if (forgotPassword($nip) > 0) {
    echo '<script> alert("Password Adalah  ' . $passbaru . '");
    document.location.href= "pegawai.php";
    </script>';
} else {
    echo '<script> alert("Password Gagal di Reset !");
     document.location.href= "pegawai.php";
    </script>';
}
