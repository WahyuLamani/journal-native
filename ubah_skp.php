<?php
session_start();
include 'template/header.php';
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT * FROM skp WHERE id_skp = $id")[0];

if (isset($_POST["ubahskp"])) {

    if (ubahSkp($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Ubah !');
                document.location.href= 'skp.php';
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<div class="container row">

    <!-- Content Column -->
    <div class="col-lg-5 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="font-weight-bold text-primary">Ubah Data SKP</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id_skp']; ?>">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sasaran Kerja</label>
                        <textarea name="uraian" class="form-control" id="exampleFormControlTextarea1" rows="2"><?= $data['uraian']; ?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="exampleFormControlInput1">Target Kerja</label>
                        <input type="number" name="target" value="<?= $data['target']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="Input Angka">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Satuan</label>
                        <input type="text" name="satuan" value="<?= $data['satuan']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="Satuan dari target (misal : dokumen atau gambar)">
                    </div>

                    <button type="submit" name="ubahskp" class="btn btn-primary">Ubah Data</button>

                </form>
            </div>
        </div>
    </div>
</div>