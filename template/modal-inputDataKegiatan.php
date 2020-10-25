<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
if (isset($_POST["tambahDataKegiatan"])) {
    if (tambahDataKegiatan($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan !');
                document.location.href= 'dokumentasi.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Di Tambahkan !');
                document.location.href= 'dokumentasi.php';
            </script>";
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="Modal-input-dataKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Data Dokumentasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pilih SKP</label>
                        <select name="id_skp" class="form-control form-control-sm">
                            <option selected>Pilih</option>
                            <?php $data = query("SELECT * FROM skp WHERE id_bagian = $id_bagian"); ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                                <option value="<?= $row['id_skp']; ?>"><?= $i . '. ' . $row['uraian']; ?></option>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="tanggal_data" value=" <?= date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="nip" value="<?= $nip; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pilih Hasil Dokumentasi</label>
                        <div class="custom-file">
                            <input type="file" name="data" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Keterangan :</label>
                        <input name="ket" class="form-control form-control-sm" type="text" placeholder="(Opsional)">
                    </div>
                    <button type="submit" name="tambahDataKegiatan" class="btn btn-primary">Daftarkan Data</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>