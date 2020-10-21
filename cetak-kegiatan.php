<?php
date_default_timezone_set("Asia/Makassar");
session_start();
$nip = $_SESSION['nip'];
$filename = date('Y-m-d H:i');
// header("Content-Type: application/xls");
// header("Content-Disposition: attachment; filename=$filename.xls");
require 'functions.php';

$sesion = $_SESSION['role_pegawai'];
if ($sesion == 'staff') {
    $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, skp.uraian, skp.target, skp.satuan, pegawai.nip, pegawai.nama FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip) WHERE pegawai.nip = $nip");
} else {
    $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, skp.uraian, skp.target, skp.satuan, pegawai.nip, pegawai.nama FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip)");
}
?>

<style>
    h4 {
        text-align: center;
    }

    td {
        text-align: center, left;
    }

    .kiri {
        text-align: left;
    }


    .kanan {
        text-align: right;

    }


    .staff {
        display: none;
    }
</style>
<h4>JURNAL HARIAN PEGAWAI<br>BAGIAN PERENCANAAN, KERJA SAMA DAN HUMAS</h4>

<ul class="kiri">
    <li>Nama : Wahyu Lamani</li>
    <li>NIP : <?= $nip; ?></li>
    <li>Jabatan : </li>
</ul>
<ul class="kanan">
    <li>Unit Kerja : Sub Bagian Perencanaan</li>
    <li>Tanggal : <?= date('Y-m-d'); ?></li>
</ul>

<table border="1" cellspacing="0">
    <thead>
        <tr>
            <th class="<?= $sesion; ?>">Nama</th>
            <th>Jenis SKP</th>
            <th>Target</th>
            <th>Aktivitas Harian</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr><?php foreach ($data as $row) : ?>
                <th class="<?= $sesion; ?>"><?= $row['nama']; ?></th>
                <!-- <td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="">Jenis SKP
                                    </button></td> -->
                <td><?= $row['uraian']; ?></td>
                <td><?= $row['target'] . ' ' . $row['satuan']; ?></td>
                <td><?= $row['kegiatan']; ?></td>
                <td><?= $row['tanggal']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>