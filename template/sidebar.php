<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php
            ">

                <div class="sidebar-brand-text mx-3">POLIMDO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php
                ">
                    <i class="fas fa-fw fa-user "></i>
                    <span>Profil Pegawai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Input Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Item List</h6>
                        <a class="collapse-item" href="kegiatan.php
                        ">Aktivitas !!</a>
                        <a class="collapse-item" href="dokumentasi.php
                        ">Dokumentasi !!</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= $_SESSION['role_pegawai']; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Ruang Admin</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Kegiatan :</h6>
                        <a class="collapse-item <?= $_SESSION['role_pegawai']; ?>" href="pegawai.php
                        ">Pegawai</a>
                        <a class="collapse-item <?= $_SESSION['role_pegawai']; ?>" href="skp.php
                        ">Sasaran Kerja Pegawai</a>
                        <a class="collapse-item <?= $_SESSION['role_pegawai']; ?>" href="bagian-subBagian.php
                        ">Bagian-SubBagian</a>
                    </div>
                </div>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>