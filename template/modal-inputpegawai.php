<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
if (isset($_POST["tambahDataPegawai"])) {

    if (tambahPegawai($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan !');
                document.location.href= 'pegawai.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Di Tambahkan !');
                document.location.href= 'pegawai.php';
            </script>";
    }
}
?>

<!-- Modal -->
<div class="modal fade" id="Modal-input-pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-primary" id="exampleModalCenterTitle">Input Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" class="<?= $wewenang; ?>">
                                <div class="form-group">
                                    <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder=" No.Induk Pegawai">
                                </div>
                                <div class="form-group">
                                    <select id="inputState" name="role" class="form-control">
                                        <option selected>Pegawai Sebagai</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staf</option>
                                    </select>
                                </div>
                                <button type="submit" name="tambahDataPegawai" class="btn btn-primary fa-pull-right">Tambah Pegawai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>