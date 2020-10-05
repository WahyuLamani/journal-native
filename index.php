<?php
session_start();
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
include 'template/sidebar.php';
require 'functions.php';

$nama = $_SESSION['nama'];
$nip = $_SESSION['nip'];
$jabatan = $_SESSION['jabatan'];
$gambar = $_SESSION['gambar'];
$wewenang = $_SESSION['role_pegawai'];
$id = $_SESSION['id'];

if (isset($_POST["tambahDataPegawai"])) {

    if (tambahPegawai($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan !');
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}


?>


<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->

            <!-- Topbar Search -->
            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                <h4>SELAMAT DATANG DI WEBSITE POLITEKNIK MANADO</h4>
            </div>

            <!-- Topbar Navbar -->
            <ul class=" navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->




                <!-- Nav Item - Messages -->


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $nama; ?> </span>
                        <img class="img-profile rounded-circle" src="img/<?= $gambar; ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                <p class="d-none d-sm-inline-block text-gray-650"> <?= 'Waktu : ' . date('Y-m-d H:i:s'); ?> </p>
            </div>
            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-9 mb-4">
                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="font-weight-bold text-primary">Data Pribadi</h6>
                        </div>
                        <div class="card-body">
                            <!-- Content -->
                            <form action="" method="POST">
                                <div class="container">
                                    <fieldset disabled>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-form-label">Nama </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-form-label">NIP</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-form-label">Jabatan</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="inputEmail3" value="<?= $nama; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="inputEmail3" value="<?= $nip; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="inputEmail3" value="<?= $jabatan; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <img src="img/<?= $gambar; ?>" alt="..." class="img-thumbnail">
                                            </div>
                                        </div>

                                    </fieldset>
                                    <a href="ubah.php?id=<?= $id; ?>" class="fas fa-edit fa-sm fa-fw mr-2 text-red-400"></a>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="font-weight-bold text-primary">Input Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder=" No.Induk Pegawai">
                                </div>
                                <div class="form-group">
                                    <select id="inputState" name="role" class="form-control">
                                        <option selected>Pegawai Sebagai</option>
                                        <option value="admin">admin</option>
                                        <option value="staff">staff</option>
                                    </select>
                                </div>
                                <button type="submit" name="tambahDataPegawai" class="btn btn-primary">Tambah Pegawai</button>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php
                    ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>