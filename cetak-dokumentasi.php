<?php
date_default_timezone_set("Asia/Makassar");
session_start();
$nip = $_SESSION['nip'];
$filename = date('Y-m-d H:i');
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=test.xls");
require 'functions.php';

$sesion = $_SESSION['role_pegawai'];
if ($sesion == 'staff') {
    $data = query("SELECT data.id_data, data.file, data.tanggal_data, data.ket, skp.uraian, skp.target, skp.satuan, pegawai.nip, pegawai.nama FROM data INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip) WHERE pegawai.nip = $nip ORDER BY skp.uraian ASC");
} else {
    $data = query("SELECT data.id_data, data.file, data.tanggal_data, data.ket, skp.uraian, skp.target, skp.satuan, pegawai.nip, pegawai.nama FROM data INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip) ORDER BY skp.uraian ASC");
}
?>

<style>
    h1 {
        text-align: center;
    }

    td {
        text-align: center, left;
    }

    .staff {
        display: none;
    }
</style>
<h1>JURNAL AKTIFITAS STAF</h1>

<table border="1" cellspacing="0">
    <thead>
        <tr>

            <th class="<?= $sesion; ?>" scope="col">Nama</th>
            <th scope="col">tanggal</th>
            <th scope="col">Nama File</th>
            <th scope="col">SKP</th>
            <th scope="col">Target</th>
            <th scope="col">Pesan</th>
        </tr>
    </thead>
    <?php $i = 1; ?>
    <tbody><?php foreach ($data as $row) : ?>
            <tr>
                <th class=" <?= $sesion; ?>"><?= $row['nama']; ?></th>
                <td><?= $row['tanggal_data']; ?></td>
                <td><?= $row['file']; ?></td>
                <!-- <td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="">Jenis SKP
                                </button></td> -->
                <td><?= $row['uraian']; ?></td>
                <td><?= substr($row['target'] . ' ' . $row['satuan'], 0, 5); ?></td>
                <td><?= $row['ket']; ?></td>
                <?php $i++; ?>
            <?php endforeach; ?>
    </tbody>
</table>