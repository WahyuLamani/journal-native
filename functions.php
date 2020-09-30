<?php
// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "journal");
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


// registrasi
function registrasi($data)
{
    global $koneksi;

    $nip = $data['nip'];
    $nama = htmlspecialchars($data['nama']);
    $password1 = mysqli_real_escape_string($koneksi, $data["password1"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $jabatan = htmlspecialchars($data['jabatan']);

    // cek kesamaan password 
    if ($password1 !== $password2) {
        echo "<script> 
            alert('Konfirmasi Password Tidak Sesuai !');
        </script>";
        return false;
    }
    //enkpassword
    $password = password_hash($password1, PASSWORD_DEFAULT);

    // user name yang di tambahkan sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip = '$nip'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert ('Nip sudah pernah di daftarkan!! Silakan Login !!')
			 </script>";
        return false;
    }

    // tambah data
    mysqli_query($koneksi, "INSERT INTO pegawai VALUE ('','$nama', '$nip', '$password','$jabatan')");

    return mysqli_affected_rows($koneksi);
}
