<?php
session_start();
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include 'template/header.php';
$sesion = $_SESSION['role_pegawai'];
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}



if (isset($_POST["ubahkegiatan"])) {

    if (ubahKegiatan($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Ubah !');
                document.location.href= 'input-kegiatan.php';
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

$id = $_GET['id'];
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
                            <?php $skp = query("SELECT * FROM skp"); ?>
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
                        <textarea name="kegiatan" class="form-control" id="exampleFormControlTextarea1" rows="3"> <?= $data['kegiatan']; ?></textarea>
                    </div>
                    <button type="submit" name="ubahkegiatan" class="btn btn-primary">Daftarkan Kegiatan</button>
                </form>
            </div>
        </div>
    </div>
</div>