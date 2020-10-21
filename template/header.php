<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
date_default_timezone_set("Asia/Makassar");
require 'functions.php';
$id = $_SESSION['id'];
$id_bagian = $_SESSION['id_bagian'];
$id_sub_bagian = $_SESSION['id_sub_bagian'];

$data = query("SELECT * FROM pegawai WHERE id_pegawai = $id")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Selamat Datang <?= $data['nama']; ?> </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/b-1.6.5/datatables.min.css" />
</head>