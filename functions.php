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
    if (strlen($password1) < 5) {
        echo "<script> 
            alert('Password Terlalu Pendek !');
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
    mysqli_query($koneksi, "INSERT INTO pegawai VALUE ('','$nama', '$nip', '$password','$jabatan','default.png')");
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
    $id_sub_bagian = $data['id_sub_bagian'];


    $query = "INSERT INTO wewenang
			VALUES
			('$nip','$role','nonaktif')";

    mysqli_query($koneksi, $query);
    mysqli_query($koneksi, "INSERT INTO unit_kerja VALUES('',$id_sub_bagian,'$nip')");

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
    // $gambarLama = $data["gambarLama"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // mengalihkan gambar ke direktori
    $delImg = 'img/';
    //  .= artinya menempel/merangkai sebuah string 
    $delImg .= $gambarLama;


    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        if ($gambar === false) {
            return false;
        } else {
            if ($gambarLama !== 'default.png') {
                @unlink($delImg);
            }
        }
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

// ubah password
function ubahPassword($data)
{
    global $koneksi;
    $nip = $data['nip'];
    $passwordLama = $data['passwordLama'];
    $password1 = $data['password1'];
    $password2 = $data['password2'];

    $query = query("SELECT * FROM pegawai WHERE nip = '$nip'")[0];
    $passverif = password_verify($passwordLama, $query['password']);
    // cek apakah pasword ada di database
    if (!$passverif) {
        echo "<script>
        alert('Password Lama Anda Salah !');
      </script>";
        return false;
    }
    // role panjang password
    if (strlen($password1) < 5) {
        echo "<script> 
            alert('Password Terlalu Pendek !');
        </script>";
        return false;
    }
    // cek kesamaan password 
    if ($password1 !== $password2) {
        echo "<script> 
            alert('Konfirmasi Password Tidak Sesuai !');
        </script>";
        return false;
    }

    $password = password_hash($password1, PASSWORD_DEFAULT);
    $query = "UPDATE pegawai SET password = '$password' WHERE nip = '$nip'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// forgot password
function forgotPassword($nip)
{
    global $koneksi;
    $passbaru = substr(uniqid(), 0, 5);

    $password = password_hash($passbaru, PASSWORD_DEFAULT);
    $query = "UPDATE pegawai SET password = '$password' WHERE nip = '$nip'";
    mysqli_query($koneksi, $query);
    return $passbaru;
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
    $id_bagian = $data['id_bagian'];

    if (empty($uraian) || empty($target) || empty($satuan)) {
        echo "<script>
				alert('Tolong Tambah Data Dengan Lengkap !');
			  </script>";
        return false;
    }

    $query = "INSERT INTO skp
			VALUES
			('','$id_bagian','$uraian','$target','$satuan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// hapus SKP
function hapus_skp($id)
{
    global $koneksi;
    $query = query("SELECT * FROM data WHERE id_skp = '$id'");

    foreach ($query as $data) {
        unlink('data/' . $data['file']);
    }



    $result = mysqli_query($koneksi, "DELETE FROM skp WHERE id_skp = $id");
    return mysqli_affected_rows($koneksi);
}

// ubah SKP
function ubahSkp($data)
{
    global $koneksi;
    $id = $data['id'];
    $uraian = htmlspecialchars($data['uraian']);
    $target = htmlspecialchars($data['target']);
    $satuan = htmlspecialchars($data['satuan']);



    if (empty($uraian) || empty($target) || empty($satuan)) {
        echo "<script>
				alert('Tolong Input Data Dengan Lengkap !');
			  </script>";
        return false;
    }
    $query = "UPDATE skp SET
            id_skp = $id,
            uraian = '$uraian',
            target = '$target',
            satuan = '$satuan'
            WHERE id_skp = $id
            ";

    $cek = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// hapus pegawai
function hapus_pegawai($id)
{
    global $koneksi;
    $return = mysqli_query($koneksi, "SELECT gambar FROM pegawai WHERE nip = $id");
    $cek = mysqli_num_rows($return);

    if ($cek > 0) {
        $hapus = mysqli_fetch_assoc($return);
        if ($hapus['gambar'] !== 'default.png') {
            @unlink('img/' . $hapus['gambar']);
        }
    }

    $result = mysqli_query($koneksi, "DELETE FROM wewenang WHERE nip = $id");

    return mysqli_affected_rows($koneksi);
}

// tambah Kegiatan
function tambahKegiatan($data)
{
    global $koneksi;
    $nip = htmlspecialchars($data['nip']);
    $kegiatan = htmlspecialchars($data['kegiatan']);
    $id_skp = $data['id_skp'];
    $tanggal = $data['tanggal'];

    if ($id_skp < 1) {
        echo "<script>
				alert('Pilih SKP !');
			  </script>";
        return false;
    }

    $query = "INSERT INTO kegiatan_pegawai
			VALUES
			('','$nip','$id_skp','$kegiatan','$tanggal')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// ubah Kegiatan
function ubahKegiatan($data)
{
    global $koneksi;
    $id_kegiatan = $data['id_kegiatan'];
    $id_skp = $data['id_skp'];
    $kegiatan = htmlspecialchars($data['kegiatan']);
    $tanggal = $data['tanggal'];



    $query = "UPDATE kegiatan_pegawai SET
            id_skp = $id_skp,
            kegiatan = '$kegiatan',
            tanggal = '$tanggal'
            WHERE id_kegiatan = $id_kegiatan";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}



// hapus kegiatan
function hapus_kegiatan($id)
{

    global $koneksi;
    $result = mysqli_query($koneksi, "DELETE FROM kegiatan_pegawai WHERE id_kegiatan = $id");

    return mysqli_affected_rows($koneksi);
}


// tambah data kegiatan
function tambahDataKegiatan($data)
{
    global $koneksi;
    $nip = htmlspecialchars($data['nip']);
    $ket = htmlspecialchars($data['ket']);
    $id_skp = $data['id_skp'];
    $tanggal = $data['tanggal_data'];

    if ($id_skp < 1) {
        echo "<script>
				alert('Pilih SKP !');
			  </script>";
        return false;
    }

    // upload data
    $data = uploadData();
    if (!$data) {
        return false;
    }
    $query = "INSERT INTO data
			VALUES
			('','$id_skp','$nip','$data','$tanggal','$ket')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// ubah Data Kegiatan
function ubahDataKegiatan($data)
{
    global $koneksi;
    $id = $data['id_data'];
    $nip = htmlspecialchars($data['nip']);
    $ket = htmlspecialchars($data['ket']);
    $dataLama = $data['dataLama'];
    $id_skp = $data['id_skp'];
    $tanggal = $data['tanggal_data'];



    if ($id_skp < 1) {
        echo "<script>
				alert('Pilih SKP !');
			  </script>";
        return false;
    }
    // cek apakah ada data yang di upload
    if ($_FILES['data']['error'] === 4) {
        $data = $dataLama;
    } else {

        $data = uploadData();

        if ($data === false) {
            return false;
        } else {
            // hapus file lama
            @unlink('data/' . $dataLama);
        }
    }
    $query = "UPDATE data SET
    id_skp = $id_skp,
    nip = '$nip',
    file = '$data',
    tanggal_data = '$tanggal',
    ket = '$ket'
    WHERE id_data = $id";

    mysqli_query($koneksi, $query);



    return mysqli_affected_rows($koneksi);
}

// hapus data kegiatan
function hapus_dataDokumentasi($id)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "DELETE FROM data WHERE id_data = $id");


    return mysqli_affected_rows($koneksi);
}


// function upload data
function uploadData()
{
    $valueRandom = 'QWERTYUIPSDFGHJKLZXCVBNM';
    $namaFile = $_FILES['data']['name'];
    $ukuranFile = $_FILES['data']['size'];
    $error = $_FILES['data']['error'];
    $tmpName = $_FILES['data']['tmp_name'];

    //cek apakah tidak ada data yang di upload
    if ($error === 4) {
        echo "<script>
				alert('silakan pilih data');
			  </script>";
        return false;
    }

    //cek apakah yang di upload adalah gambar
    $ekstensiDataValid = ['jpg', 'jpeg', 'png', 'docx', 'doc', 'xls', 'pdf'];
    $ekstensiData = explode('.', $namaFile);
    $namabaru = $ekstensiData[0];
    $ekstensiData = strtolower(end($ekstensiData));
    if (!in_array($ekstensiData, $ekstensiDataValid)) {
        echo "<script>
				alert('Yang Di Upload Bukan File Seharusnya !');
			  </script>";
        return false;
    }
    //cek ukuran gambar
    if ($ukuranFile > 3000000) {
        echo "<script>
				alert('Ukuran file terlalu besar');
			  </script>";
        return false;
    }
    //lolos pengecekan format dan ukuran, upload gambar ke database
    // buat nama file baru agar tidak tertimpa
    $namaFileBaru = $namabaru;
    $namaFileBaru .= '_';
    $namaFileBaru .= substr(str_shuffle($valueRandom), 0, 2);
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiData;

    move_uploaded_file($tmpName, 'data/' . $namaFileBaru);

    return $namaFileBaru;
}
