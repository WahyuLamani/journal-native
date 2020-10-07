<?php

$id = $_GET['id'];
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
require 'functions.php';

$id = $_GET["id"];
if (hapus_skp($id) > 0) {
    echo ' <script> alert("data berhasil di hapus !");
    document.location.href= "skp.php";
    </script>';
} else {
    echo '<script> alert("data gagal di hapus !");
     document.location.href= "skp.php";
    </script>';
}
