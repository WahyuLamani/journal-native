<?php
// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "journal");


// registrasi


// query
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($baris = mysqli_fetch_assoc($result)) {
        $rows[] = $baris;
    }
    return $rows;
}
