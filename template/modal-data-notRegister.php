<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
$data = query("SELECT * FROM wewenang WHERE user_is = 'nonaktif'");
?>
<!-- Modal -->
<div class="modal fade" id="Modal-data-notRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title font-weight-bold text-primary" id="exampleModalCenterTitle">Pegawai Yang Belum Melakukan Registrasi :</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Induk Pegawai</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>

                        </tr>
                    </thead>
                    <tbody> <?php $i = 1; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $row['nip']; ?></td>
                                <td><?= $row['role_pegawai']; ?></td>
                                <td><a href="hapus_pegawai.php?nip=<?= $row['nip']; ?>" onclick="return confirm('Yakin ingin Hapus data dengan NIP <?= $row['nip']; ?>?');" class="fas fa-trash fa-sm fa-fw mr-1"> </a></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>