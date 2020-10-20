<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
if (isset($_POST["tambahkegiatan"])) {
    if (tambahKegiatan($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan !');
                document.location.href= 'kegiatan.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Di Tambahkan !');
                document.location.href= 'kegiatan.php';
            </script>";
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="Modal-input-kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pilih SKP</label>
                        <select name="id_skp" class="form-control form-control-sm">
                            <option selected>Pilih</option>
                            <?php $data = query("SELECT * FROM skp"); ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                                <option value="<?= $row['id_skp']; ?>"><?= $i . '. ' . $row['uraian']; ?></option>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="tanggal" value=" <?= date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="nip" value="<?= $nip; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Uraian Kegiatan Yang di Lakukan</label>
                        <textarea name="kegiatan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" name="tambahkegiatan" class="btn btn-primary">Daftarkan Kegiatan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>