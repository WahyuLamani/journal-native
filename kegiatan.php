<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
include 'template/sidebar.php';
include 'template/topbar.php';


$nip = $_SESSION['nip'];
$sesion = $_SESSION['role_pegawai'];
if ($sesion == 'staff') {
    $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, unit_kerja.id_sub_bagian, skp.uraian, skp.target, skp.satuan, skp.id_bagian, pegawai.nip, pegawai.nama FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip)INNER JOIN unit_kerja USING (nip) WHERE unit_kerja.id_sub_bagian = $id_sub_bagian AND pegawai.nip = $nip");
    // $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, skp.uraian, skp.target, skp.satuan, pegawai.nip, pegawai.nama FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip) WHERE pegawai.nip = $nip");
} else {
    // $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, skp.uraian, skp.target, skp.satuan, pegawai.nip, pegawai.nama FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip)");
    $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, unit_kerja.id_sub_bagian, skp.uraian, skp.target, skp.satuan, skp.id_bagian, pegawai.nip, pegawai.nama, sub_bagian.uraian AS sub_uraian FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip)INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian) WHERE skp.id_bagian = $id_bagian");
}



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
    <h5 class="font-weight-light text-primary">Unit Kerja : <?= $sub_bagian['uraian']; ?></h5>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Menu <a href="cetak-kegiatan.php" target="_blank" type="button" class="btn btn-primary fas fa-file-excel text-white fa-pull-right"></a></h6>
            <div class="media">
                <button data-toggle="modal" data-target="#Modal-input-kegiatan" class="btn btn-primary mt-3 mr-3">Tambah Kegiatan Hari Ini</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered myTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="<?= $sesion; ?>">Nama</th>
                            <th scope="col">Jenis SKP</th>
                            <th scope="col">Target</th>
                            <th scope="col">Aktifitas</th>
                            <th scope="col" class="<?= $sesion; ?>">Sub Bagian</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" width="30">Edit</th>
                        </tr>
                    </thead>
                    <tbody><?php foreach ($data as $row) : ?>
                            <tr>
                                <th class="<?= $sesion; ?>"><?= $row['nama']; ?></th>
                                <td><?= $row['uraian']; ?></td>
                                <td><?= substr($row['target'] . ' ' . $row['satuan'], 0, 5); ?></td>
                                <td><?= $row['kegiatan']; ?></td>
                                <th scope="col" class="<?= $sesion; ?>"><?= $row['sub_uraian']; ?></th>
                                <td><?= $row['tanggal']; ?></td>
                                <td><a href="getHalaman.php?id=<?= $row['id_kegiatan']; ?>&hal=<?= 'ubah_kegiatan.php'; ?>" class="fas fa-pen fa-sm fa-fw mr-1"><a href="hapus_kegiatan.php?id=<?= $row['id_kegiatan']; ?>" onclick="return confirm('Yakin Ingin Hapus data?');" class="fas fa-trash fa-sm fa-fw mr-1 <?= $_SESSION['role_pegawai']; ?>"></a></a></td>
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