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

    // cek NIP dari database
    $cek = mysqli_query($koneksi, "SELECT * FROM wewenang WHERE nip = '$nip'");
    if (mysqli_num_rows($cek) < 1) {
        echo "<script> 
            alert('NIP yang di masukan tidak valid !');
        </script>";
        return false;
    }

    if ($password1 !== $password2) {
        // cek kesamaan password 

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
    mysqli_query($koneksi, "INSERT INTO pegawai VALUE ('','$nama', '$nip', '$password','$jabatan','')");
    $query = "UPDATE wewenang SET user_is = 'aktif' WHERE nip = $nip";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// tambah pegawai
function tambahPegawai($data)
{
    global $koneksi;
    $nip = htmlspecialchars($data['nip']);
    $role = $data['role'];

    $query = "INSERT INTO wewenang
			VALUES
			('$nip','$role','nonaktif')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// ubah profile pegawai
function ubahProfile($data)
{
    global $koneksi;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nip = htmlspecialchars($data["nip"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $password = $data["password"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    $query = "UPDATE pegawai SET
				id_pegawai = $id,
				nama = '$nama',
				nip = '$nip',
                password = '$password',	
				jabatan = '$jabatan',
				gambar = '$gambar'
				WHERE id_pegawai = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}







// function upload
function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    //cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
				alert('silakan pilih gambar');
			  </script>";
        return false;
    }

    //cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
				alert('yang di upload bukan gambar');
			  </script>";
        return false;
    }
    //cek ukuran gambar
    if ($ukuranFile > 2000000) {
        echo "<script>
				alert('Ukuran gambar terlalu besar');
			  </script>";
        return false;
    }


    //lolos pengecekan format dan ukuran, upload gambar ke database
    //ubah namafile gambar agar tidak terjadi penimpaan nama gambar pada database
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}


// tambah SKP
function inputSkp($data)
{
    global $koneksi;
    $uraian = htmlspecialchars($data['uraian']);
    $target = $data['target'];
    $satuan = htmlspecialchars($data['satuan']);

    $query = "INSERT INTO skp
			VALUES
			('','$uraian','$target','$satuan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// hapus SKP
function hapus_skp($id)
{

    global $koneksi;
    $result = mysqli_query($koneksi, "DELETE FROM skp WHERE id_skp = $id");


    return mysqli_affected_rows($koneksi);
}

// ubah SKP
function ubahSkp($data)
{
    global $koneksi;
    $id = $data['id'];
    $uraian = htmlspecialchars($data['uraian']);
    $target = $data['target'];
    $satuan = htmlspecialchars($data['satuan']);

    $query = "UPDATE skp SET
            id_skp = $id,
            uraian = '$uraian',
            satuan = '$satuan'
            WHERE id_skp = $id
            ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// hapus SKP
function hapus_pegawai($id)
{

    global $koneksi;
    $result = mysqli_query($koneksi, "DELETE FROM wewenang WHERE nip = $id");

    return mysqli_affected_rows($koneksi);
}
