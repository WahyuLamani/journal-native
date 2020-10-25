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



$data = query("SELECT * FROM bagian");
$data2 = query("SELECT * FROM sub_bagian");


if (isset($_POST["inputskp"])) {

    if (inputSkp($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan !');
                document.location.href= 'skp.php';
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
        <h1 class="h3 mb-4 text-gray-800">Bagian dan Sub Bagian</h1>
        <p class="d-none d-sm-inline-block text-gray-650"> <?= date('Y-m-d H:i:s'); ?> </p>
    </div>
    <!-- content row -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary text-center">Bagian</h5>
                </div>
                <div class="card-body">

                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Id</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody><?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $row['uraian']; ?></td>
                                    <td><?= $row['id_bagian']; ?></td>
                                    <td><a href="getHalaman.php?id=<?= $row['id_bagian']; ?>&hal=<?= 'ubah_bagian.php'; ?>" class="fas fa-pen fa-sm fa-fw"></a></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary text-center">Sub Bagian</h5>
                </div>
                <div class="card-body">

                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Target</th>
                                <th scope="col">Edit</th>
                            </tr>

                        </thead>
                        <tbody><?php $i = 1; ?>
                            <?php foreach ($data2 as $row) : ?>
                                <tr>
                                    <td><?= $row['uraian']; ?></td>
                                    <td><?= 'id Bagian ' . $row['id_bagian']; ?></td>
                                    <td><a href="getHalaman.php?id=<?= $row['id_sub_bagian']; ?>&hal=<?= 'ubah_subBagian.php'; ?>" class="fas fa-pen fa-sm fa-fw mr-1"></a></td>
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

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>



</body>

</html>