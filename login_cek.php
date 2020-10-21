<?php
session_start();
require 'functions.php';

// ambil data
$nip = ($_POST['nip']);
$password = $_POST['password'];

$result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip = '$nip'");
$data = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($data > 0) {
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['jabatan'] = $row['jabatan'];
    // $_SESSION['gambar'] = $row['gambar'];
    $_SESSION['id'] = $row['id_pegawai'];

    $passverif = password_verify($password, $row["password"]);
    kelola_data();
} else {
    echo '<script> alert("Nip Yang dimasukan Salah !"); 
    document.location.href="login.php";</script>';
    exit;
}

// $login = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip = '$nip' AND password = '$passverif'");
// // menyeleksi data user dengan username dan password yang sesuai
// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($login);

function kelola_data()
{
    global $koneksi;
    global $nip;
    global $passverif;
    if ($passverif === true) {
        $level = mysqli_query($koneksi, "SELECT wewenang.nip, wewenang.role_pegawai, unit_kerja.id_sub_bagian, sub_bagian.id_bagian FROM wewenang INNER JOIN unit_kerja USING (nip) INNER JOIN sub_bagian USING (id_sub_bagian)  WHERE wewenang.nip = '$nip'");

        $cek = mysqli_num_rows($level);

        $data = mysqli_fetch_assoc($level);
        if ($cek > 0) {
            $_SESSION['login'] = true;

            // cek jika user login sebagai admin
            if ($data['role_pegawai'] == "admin") {

                // buat session login dan username
                $_SESSION['nip'] = $nip;
                $_SESSION['role_pegawai'] = "admin";
                $_SESSION['id_sub_bagian'] = $data['id_sub_bagian'];
                $_SESSION['id_bagian'] = $data['id_bagian'];
                // alihkan ke halaman dashboard admin
                header("location:index.php");

                // cek jika user login sebagai pegawai
            } else if ($data['role_pegawai'] == "staff") {
                // buat session login dan nip
                $_SESSION['nip'] = $nip;
                $_SESSION['role_pegawai'] = "staff";
                $_SESSION['id_sub_bagian'] = $data['id_sub_bagian'];
                $_SESSION['id_bagian'] = $data['id_bagian'];
                // alihkan ke halaman dashboard operator
                header("location:index.php");

                // cek jika user login sebagai pengurus
            } else {
                // alihkan ke halaman login kembali
                header("login.php");
            }
        }
    } else {
        echo '<script> alert("Password salah !"); 
    document.location.href="login.php";</script>';
    }
}
