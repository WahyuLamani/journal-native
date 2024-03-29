<?php
session_start();
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
$sesion = $_SESSION['role_pegawai'];

if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
include 'template/sidebar.php';
include 'template/topbar.php';



if (isset($_POST["ubahkegiatan"])) {

    if (ubahKegiatan($_POST) > 0) {
        // if (forgotPassword() > 0) {
        //     echo forgotPassword();
        //     die;
        echo "<script>
                alert('Data Berhasil Di Ubah !');
                document.location.href= 'kegiatan.php';
            </script>";
        unset($_SESSION['id_data']);
    } else {
        echo '<script> alert("data gagal di ubah !");
        document.location.href= "kegiatan.php";
        </script>';
    }
}

$id = $_SESSION['id_data'];
$data = query("SELECT * FROM kegiatan_pegawai WHERE id_kegiatan = $id")[0];

?>



<div class="container row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="font-weight-bold text-primary">Ubah Kegiatan</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pilih SKP</label>
                        <select name="id_skp" class="form-control form-control-sm">
                            <?php $valskp = $data['id_skp'];
                            $skpselect = query("SELECT * FROM skp WHERE id_skp = $valskp")[0]; ?>
                            <option selected value="<?= $skpselect['id_skp']; ?>"><?= $skpselect['uraian']; ?></option>
                            <?php $skp = query("SELECT * FROM skp WHERE id_bagian = $id_bagian"); ?>
                            <?php $i = 1; ?>
                            <?php foreach ($skp as $row) : ?>
                                <option value="<?= $row['id_skp']; ?>"><?= $i . '. ' . $row['uraian']; ?></option>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name='id_kegiatan' value="<?= $data['id_kegiatan']; ?>">
                        <input type="hidden" name="tanggal" value=" <?= date('Y-m-d H:i:s'); ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Uraian Kegiatan Yang di Lakukan</label>
                        <textarea name="kegiatan" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $data['kegiatan']; ?></textarea>
                    </div>
                    <button type="submit" name="ubahkegiatan" class="btn btn-primary">Daftarkan Kegiatan</button>
                </form>
            </div>
        </div>
    </div>
</div>


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

<?php
include 'template/modal.php';
include 'template/modal-inputKegiatan.php';
include 'template/modal-inputDataKegiatan.php';

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
<script>
    $('.admin').show();
    $('.staff').hide();
</script>
</body>

</html>