<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
include 'template/sidebar.php';
include 'template/topbar.php';





?>


<!-- End of Sidebar -->
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800">Profil Pegawai</h1>
        <p class="d-none d-sm-inline-block text-gray-650"> <?= date('Y-m-d H:i:s'); ?> </p>
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
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">Nama</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">NIP</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">Jabatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">Unit Kerja</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="inputEmail3" value="<?= $data['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="inputEmail3" value="<?= $data['nip']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="inputEmail3" value="<?= $data['jabatan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="inputEmail3" value="<?= $sub_bagian['uraian']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <img src="img/<?= $data['gambar']; ?>" alt="..." class="img-thumbnail" width="250">
                                    </div>
                                </div>
                            </fieldset>

                            <a href="#ubahProfile" data-toggle="modal" class="fas fa-edit fa-lg fa-fw mr-2 text-red-400"></a>


                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- col-lg-3 -->
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php
include 'template/footer.php';
?>
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
include 'template/modal-ubahProfile.php';
?>






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
<script>
    $('.admin').show();
    $('.staff').hide();
</script>


</body>

</html>