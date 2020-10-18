<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');

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
<!-- Modal -->
<div class="modal fade" id="ubahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                <input type="hidden" name="gambarLama" value="<?= $data['gambar']; ?>">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" id="inputEmail3" value="<?= $data['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nip" class="form-control" id="inputEmail3" value="<?= $data['nip']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="jabatan" class="form-control" id="inputEmail3" value="<?= $data['jabatan']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <img src="img/<?= $data['gambar']; ?>" alt="..." width="200" class="img-thumbnail">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ubah Foto</label>
                                    <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary my-1">Ubah Data</button>
                        <a href="ubahpassword.php" type="button" name="ubahPassword" class="btn btn-info mr-2 fa-pull-right text-white">ubah Password</a>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>