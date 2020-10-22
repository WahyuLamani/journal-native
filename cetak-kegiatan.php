<?php
date_default_timezone_set("Asia/Makassar");
session_start();
$nip = $_SESSION['nip'];
$filename = date('Y-m-d H:i');
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=AKTIFITAS $filename.xls");
require 'functions.php';
$id_bagian = $_SESSION['id_bagian'];
$id_sub_bagian = $_SESSION['id_sub_bagian'];

$sub_bagian = query("SELECT unit_kerja.id_sub_bagian, sub_bagian.* FROM unit_kerja INNER JOIN sub_bagian USING (id_sub_bagian) WHERE unit_kerja.id_sub_bagian = $id_sub_bagian")[0];

$sesion = $_SESSION['role_pegawai'];
if ($sesion == 'staff') {
    $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, unit_kerja.id_sub_bagian, skp.uraian, skp.target, skp.satuan, skp.id_bagian, pegawai.nip, pegawai.nama, sub_bagian.uraian AS sub_uraian FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip)INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian) WHERE unit_kerja.id_sub_bagian = $id_sub_bagian AND pegawai.nip = $nip");
} else {
    $data = query("SELECT kegiatan_pegawai.id_kegiatan, kegiatan_pegawai.kegiatan, kegiatan_pegawai.tanggal, unit_kerja.id_sub_bagian, skp.uraian, skp.target, skp.satuan, skp.id_bagian, pegawai.nip, pegawai.nama, sub_bagian.uraian AS sub_uraian FROM kegiatan_pegawai INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip)INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian) WHERE skp.id_bagian = $id_bagian");
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
    <li>Unit Kerja : <?= $sub_bagian['uraian']; ?></li>
    <li>Tanggal : <?= date('Y-m-d'); ?></li>
</ul>

<table border="1" cellspacing="0">
    <thead>
        <tr>
            <th class="<?= $sesion; ?>">Nama</th>
            <th>Jenis SKP</th>
            <th>Target</th>
            <th>Aktivitas Harian</th>
            <th scope="col">Sub Bagian</th>
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
                <td scope="col"><?= $row['sub_uraian']; ?></td>
                <td><?= $row['tanggal']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>