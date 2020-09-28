<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<script type="text/javascript">
    function tampil(param) {
        if (param == 1)
            document.getElementById("jabatan").style.visibility = 'visible';
        else
            document.getElementById("jabatan").style.visibility = 'hidden';

    }

    function formel(param) {
        if (param == 1)
            document.getElementById("formel").style.visibility = 'visible';
        else
            document.getElementById("formel").style.visibility = 'hidden';

    }
</script>


<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg-5 my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                            </div>
                            <form method="POST" action="" class="user">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-user" id="keyword" placeholder="Masukan NIP Yang Terdaftar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="tombol" ">Cek NIP</button>
                                    </div>
                                </div>
                                <div id=" formel" style="visibility: hidden;">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="username" id="Username" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password" class="form-control form-control-user" name="password1" id="exampleInputPassword" placeholder="Password">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user" name="password2" id="exampleRepeatPassword" placeholder="Ketik Ulang Password">
                                                </div>
                                            </div>
                                            <div class="input-group" id="jabatan" " type=" hidden">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Jabatan Sebagai</span>
                                                </div>
                                                <input type="text" aria-label="First name" class="form-control">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Daftarkan Akun
                                            </button>
                                    </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/script.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>