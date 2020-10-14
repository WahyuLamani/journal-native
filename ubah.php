<?php
session_start();
include 'template/header.php';
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}


require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT * FROM pegawai WHERE id_pegawai = $id")[0];

if (isset($_POST["ubah"])) {

    if (ubahProfile($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Ubah !');
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

?>
<div class="container">
    <div class="col-lg-9 mb-2">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">Ubah Data Diri</h6>
            </div>
            <div class="card-body">
                <!-- Content -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="inputEmail3" class=" col-form-label">Nama</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class=" col-form-label">NIP</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class=" col-form-label">Jabatan</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="<?= $data['id_pegawai']; ?>">
                                <input type="hidden" name="password" value="<?= $data['password']; ?>">
                                <input type="hidden" name="gambarLama" value="<?= $data['gambar']; ?> ">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" id="inputEmail3" value="<?= $data['nama']; ?>">
                                </div>
                                <fieldset disabled>
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control" id="inputEmail3" value="<?= $data['nip']; ?>">
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <input type="text" name="jabatan" class="form-control" id="inputEmail3" value="<?= $data['jabatan']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <img src="img/<?= $data['gambar']; ?>" alt="..." width="100" class="img-thumbnail">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Tambahkan Foto</label>
                                    <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary my-1">Ubah Data</button>


                    </div>
                </form>
                <!-- <button type="submit" onclick="javascript:history.back()" class="btn btn-primary my-1">kembali</button> -->
                <a href="index.php" class="btn btn-primary">kembali</a>
            </div>
        </div>

    </div>
</div>