<?php
session_start();
include 'template/header.php';
require 'functions.php';
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
                                    <input type="email" class="form-control" id="inputEmail3" value="kosong">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inputEmail3" value="kosong">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inputEmail3" value="kosong">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <img src="img/polimdo.jpg" alt="..." class="img-thumbnail">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-1">Ubah Data</button>


                    </div>
                </form>
            </div>
        </div>

    </div>
</div>