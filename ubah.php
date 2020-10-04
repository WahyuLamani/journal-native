<?php
session_start();
include 'template/header.php';
require 'functions.php';

$id = $_GET['id'];

$data = query("SELECT * FROM pegawai WHERE id_pegawai = $id")[0];

?>
<div class="container">
    <div class="col-lg-9 mb-2">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">Ubah Data Diri</h6>
            </div>
            <div class="card-body">
                <!-- Content -->
                <form action="" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="inputEmail3" class=" col-form-label">Email</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class=" col-form-label">NIP</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class=" col-form-label">Jabatan</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputEmail3" value="<?= $data['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputEmail3" value="<?= $data['nip'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputEmail3" value="<?= $data['jabatan'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <img src="img/<?= $data['gambar'] ?>" alt="..." class="img-thumbnail">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file input</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" value="<?= $data['gambar'] ?>">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-1">Ubah Data</button>


                    </div>
                </form>
            </div>
        </div>

    </div>
</div>