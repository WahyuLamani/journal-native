<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
include 'template/sidebar.php';
include 'template/topbar.php';


if (isset($_POST["ubahDataKegiatan"])) {

    if (ubahDataKegiatan($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Ubah !');
                document.location.href= 'dokumentasi.php';
            </script>";
        unset($_SESSION['id_data']);
    } else {
        echo "<script>
                alert('Data Gagal Di ubah !');
                document.location.href= 'ubah_dokumentasi.php';
            </script>";
    }
}
$nip = $_SESSION['nip'];
$id = $_SESSION['id_data'];
$data = query("SELECT * FROM data WHERE id_data = $id")[0];

?>

<div class="container row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="font-weight-bold text-primary">Ubah Data Dokumentasi</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" name="id_data" value="<?= $data['id_data']; ?>">
                        <input type="hidden" name="tanggal_data" value=" <?= date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="nip" value="<?= $nip; ?>">
                        <input type="hidden" name="dataLama" value="<?= $data['file']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pilih Hasil Dokumentasi</label>
                        <div class="custom-file">
                            <input type="file" name="data" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">

                            <label class="custom-file-label" for="inputGroupFile01"><?= $data['file']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Keterangan :</label>
                        <input name="ket" class="form-control form-control-sm" type="text" value="<?= $data['ket']; ?>" placeholder="(Opsional)">
                    </div>
                    <button type="submit" name="ubahDataKegiatan" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>


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
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
</body>