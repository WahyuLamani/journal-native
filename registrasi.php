<?php
include 'template/log-header.php';
require 'functions.php';

$data['nip'] = ['nip'];
if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Berhasil Registrasi, Silakan Login !');
                document.location.href= 'login.php';
            </script>";
    } else {
        echo "<script>
        alert('Gagal Registrasi !');
        document.location.href= 'registrasi.php';
    </script>";
    }
}

?>



<div class="container">

    <div class="card o-hidden border-0 shadow-lg-5 my-5 col-lg-7 mx-auto warna">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-white mb-4">Registrasi !</h1>
                        </div>
                        <form method="POST" action="" class="user">
                            <div class="input-group mb-3">
                                <input id="keyword" type="text" name="nip" class="form-control form-control-user" placeholder="Masukan NIP Yang Terdaftar" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
                                <div class="input-group-append">
                                    <a class="badge badge-primary text-white" style="border-radius: 10;" type="button" id="tombol">Cek NIP</a>
                                </div>
                            </div>
                            <div id="formel">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password1" id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password2" id="exampleRepeatPassword" placeholder="Ketik Ulang Password" required>
                                    </div>
                                </div>
                                <div class="input-group" id="jabatan" type="hidden">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Jabatan Sebagai</span>
                                    </div>
                                    <input type="text" aria-label="First name" name="jabatan" class="form-control" required>
                                </div>
                                <hr>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Daftarkan Akun
                                </button>
                            </div>


                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="large text-info" href="login.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script>
    $('#formel').hide();
    $(document).ready(function() {

        $('#tombol').on('click', function() {

            var data = $('#keyword').val();

            $.ajax({
                type: 'GET',
                url: 'ajax/cari.php?keyword=' + data,
                data: data,
                success: function(data) {
                    let parsed = JSON.parse(data);
                    console.log(parsed);
                    let status = parsed.status;
                    console.log(status);
                    if (status === 1) {
                        alert("NIP Terdaftar");
                        $('#formel').show();
                    } else {
                        alert("NIP Tidak Terdaftar");

                    }
                }
            })
        });
    });
</script>
</body>

</html>