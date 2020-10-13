<?php
session_start();
include 'template/header.php';
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
$sesion = $_SESSION['role_pegawai'];
if (isset($_SESSION['login'])) {
    if ($sesion == 'staff') {
        exit('<h1><i class="fas fa-times-circle"></i> Access is Denied !!</h1>');
    }
} else {
    header('location:login.php');
}

include 'template/sidebar.php';
include 'template/topbar.php';
require 'functions.php';

$data = query("SELECT * FROM skp");


if (isset($_POST["inputskp"])) {

    if (inputSkp($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan !');
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-4 text-gray-800">Sasaran Kerja Pegawai (SKP)</h1>
        <p class="d-none d-sm-inline-block text-gray-650"> <?= date('Y-m-d H:i:s'); ?> </p>
    </div>
    <!-- content row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-5 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary">Input Data SKP</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sasaran Kerja</label>
                            <textarea name="uraian" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="......."></textarea>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="exampleFormControlInput1">Target Kerja</label>
                            <input type="number" name="target" class="form-control" id="exampleFormControlInput1" placeholder="Input Angka">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Satuan</label>
                            <input type="text" name="satuan" class="form-control" id="exampleFormControlInput1" placeholder="Satuan dari target (misal : dokumen atau gambar)">
                        </div>

                        <button type="submit" name="inputskp" class="btn btn-primary fa-pull-right">Input data</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary text-center">SKP tahun <?= date('Y'); ?></h5>
                    <i class="fas fa-info fa-sm fa-fw mr-2 text-gray-760" data-toggle="tooltip" data-placement="top" title="Reload Halaman Jika Anda Menambahkan Data Baru !">
                    </i>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Target</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody><?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $row['uraian']; ?></td>
                                    <td><?= $row['target']; ?></td>
                                    <td><?= $row['satuan']; ?></td>
                                    <td> <a href="ubah_skp.php?id=<?= $row['id_skp']; ?>" class="fas fa-pen fa-sm fa-fw mr-1"> </a>|
                                        <a href="hapus_skp.php?id=<?= $row['id_skp']; ?>" class="fas fa-trash fa-sm fa-fw mr-1"> </a></td>
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

<!-- Logout Modal-->
<?php
include 'template/modal.php';
?>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>

</body>

</html>