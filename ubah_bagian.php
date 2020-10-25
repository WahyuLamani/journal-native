<?php
session_start();
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
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



$id = $_SESSION['id_data'];
$data = query("SELECT * FROM bagian WHERE id_bagian = $id")[0];

if (isset($_POST["ubahbagian"])) {
    // var_dump($_POST);
    // die;
    if (ubahBagian($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Ubah !');
                document.location.href= 'bagian-subBagian.php';
            </script>";
        unset($_SESSION['id_data']);
    } else {
        echo "<script>
                alert('Data Gagal Di Ubah !');
                document.location.href= 'ubah_bagian.php';
            </script>";
    }
}
?>
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-4 text-gray-800">Satuan Bagian</h1>
        <p class="d-none d-sm-inline-block text-gray-650"> <?= date('Y-m-d H:i:s'); ?> </p>
    </div>
    <!-- content row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-5 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary">Ubah Data Satuan Bagian</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id_bagian" value="<?= $data['id_bagian']; ?>">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sasaran Kerja</label>
                            <textarea name="uraian" class="form-control" id="exampleFormControlTextarea1" rows="2"><?= $data['uraian']; ?></textarea>
                        </div>

                        <button type="submit" name="ubahbagian" class="btn btn-primary">Ubah Data</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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



</body>

</html>