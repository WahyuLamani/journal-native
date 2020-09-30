<?php
session_start();
require 'functions.php';

// ambil data
$nip = ($_POST['nip']);
$password = $_POST['password'];



// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip = '$nip'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    //cek password
    $row = mysqli_fetch_assoc($login);
    if (password_verify($password, $row(["password"]))) {

        $level = mysqli_query($koneksi, "SELECT * FROM wewenang WHERE nip = '$nip'");

        $cek = mysqli_num_rows($level);

        $data = mysqli_fetch_assoc($level);
        if ($cek > 0) {

            // cek jika user login sebagai admin
            if ($data['role_pegawai'] == "admin") {

                // buat session login dan username
                $_SESSION['nip'] = $nip;
                $_SESSION['role_pegawai'] = "admin";
                // alihkan ke halaman dashboard admin
                header("location:index.php");

                // cek jika user login sebagai pegawai
            } else if ($data['role_pegawai'] == "staff") {
                // buat session login dan nip
                $_SESSION['nip'] = $nip;
                $_SESSION['role_pegawai'] = "staff";
                // alihkan ke halaman dashboard operator
                header("location:staff/");

                // cek jika user login sebagai pengurus
            } else {
                // alihkan ke halaman login kembali
                header("location:login.php?pesan=gagal");
            }
        }
    };
} else {
    echo '<script> alert("NIP atau Password salah !"); 
    window.location.href="http://localhost/journal-native/login.php";</script>';
}
