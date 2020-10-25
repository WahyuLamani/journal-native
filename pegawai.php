<?php
session_start();
$sesion = $_SESSION['role_pegawai'];
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
if (isset($_SESSION['login'])) {
    if ($sesion == 'staff') {
        exit('<h1><i class="fas fa-times-circle"></i> Access is Denied !!</h1>');
    }
} else {
    header('location:login.php');
}
include 'template/sidebar.php';
include 'template/topbar.php';



$data = query("SELECT pegawai.*, unit_kerja.id_sub_bagian, sub_bagian.id_bagian FROM pegawai INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian) WHERE id_bagian = '$id_bagian'");
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
                <button data-toggle="modal" data-target="#Modal-input-pegawai" class="btn btn-primary mt-3 mr-3">Tambah Pegawai</button>
                <button data-toggle="modal" data-target="#Modal-data-notRegister" class="btn btn-warning mt-3 mr-3">Belum registrasi</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nomor Induk Pegawai</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th width="125">Edit</th>
                        </tr>
                    </thead>
                    <tbody><?php $i = 1; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nip']; ?></td>
                                <td><?= $row['jabatan']; ?></td>
                                <td><img width="45" class="img-profile rounded-circle" src="img/<?= $row['gambar']; ?>">
                                </td>
                                <td><a href="hapus_pegawai.php?nip=<?= $row['nip']; ?>" onclick="return confirm('Yakin Ingin Hapus data <?= $row['nama']; ?>?');" class="fas fa-trash fa-sm fa-fw mr-1"> </a> || <a href="forgotPassword.php?nip=<?= $row['nip']; ?>" onclick="return confirm('Reset Password <?= $row['nama']; ?>?');" class="btn btn-danger fas fa-undo fa-sm"> Password</a></td>
                            </tr>
                            <?php $i++; ?>
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
include 'template/modal-inputpegawai.php';
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