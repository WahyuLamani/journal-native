<?php
session_start();
require 'functions.php';
include 'template/header.php';
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));

if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
include 'template/sidebar.php';
include 'template/topbar.php';
$nip = $_SESSION['nip'];

$data = query("SELECT * FROM kegiatan_pegawai");

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
        information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p> -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-4 text-gray-800">Pegawai</h1>
        <p class="d-none d-sm-inline-block text-gray-650"> <?= date('Y-m-d H:i:s'); ?> </p>


    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
            <div class="media">
                <button data-toggle="modal" data-target="#Modal-input-kegiatan" class="btn btn-primary mt-3 mr-3">Tambah Kegiatan Hari Ini</button>
                <button data-toggle="modal" data-target="#Modal-data-notRegister" class="btn btn-warning mt-3 mr-3">Belum registrasi</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr><?php foreach ($data as $row) : ?>
                                <td>Lorem.</td>
                                <td>Lorem.</td>
                                <td>Lorem.</td>
                                <td>Lorem.</td>
                                <td><a href="#" onclick="return confirm('Yakin Ingin Hapus data?');" class="fas fa-trash fa-sm fa-fw mr-1"> </a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
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

<?php
include 'template/modal.php';
include 'template/modal-inputKegiatan.php';
include 'template/modal-data-notRegister.php';
?>



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>