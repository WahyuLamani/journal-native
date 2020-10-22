<?php
date_default_timezone_set("Asia/Makassar");
session_start();
$nip = $_SESSION['nip'];
$filename = date('Y-m-d H:i');
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DOKUMENTASI $filename.xls");
require 'functions.php';
$id_bagian = $_SESSION['id_bagian'];
$id_sub_bagian = $_SESSION['id_sub_bagian'];

$sub_bagian = query("SELECT unit_kerja.id_sub_bagian, sub_bagian.* FROM unit_kerja INNER JOIN sub_bagian USING (id_sub_bagian) WHERE unit_kerja.id_sub_bagian = $id_sub_bagian")[0];


$sesion = $_SESSION['role_pegawai'];
if ($sesion == 'staff') {
    $data = query("SELECT data.id_data, data.file, data.tanggal_data, data.ket, skp.uraian, skp.target, skp.satuan, skp.id_bagian, pegawai.nip, pegawai.nama, unit_kerja.id_sub_bagian, sub_bagian.uraian AS sub_uraian FROM data INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip) INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian) WHERE unit_kerja.id_sub_bagian = $id_sub_bagian AND pegawai.nip = $nip ORDER BY sub_uraian ASC");
} else {
    $data = query("SELECT data.id_data, data.file, data.tanggal_data, data.ket, skp.uraian, skp.target, skp.satuan, skp.id_bagian, pegawai.nip, pegawai.nama, unit_kerja.id_sub_bagian, sub_bagian.uraian AS sub_uraian FROM data INNER JOIN skp USING(id_skp) INNER JOIN pegawai USING(nip) INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian) WHERE skp.id_bagian = $id_bagian ORDER BY sub_uraian ASC");
}
?>

<style>
    h4 {
        text-align: center;
    }

    .kiri {
        text-align: left;
    }


    .kanan {
        text-align: right;

    }

    td {
        text-align: center, left;
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

            <th class="<?= $sesion; ?>" scope="col">Nama</th>
            <th scope="col">tanggal</th>
            <th scope="col">Nama File</th>
            <th scope="col">SKP</th>
            <th scope="col">Target</th>
            <th scope="col">Sub Bagian</th>
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
                <td scope="col" class="<?= $sesion; ?>"><?= $row['sub_uraian']; ?></td>
                <td><?= $row['ket']; ?></td>
                <?php $i++; ?>
            <?php endforeach; ?>
    </tbody>
</table>