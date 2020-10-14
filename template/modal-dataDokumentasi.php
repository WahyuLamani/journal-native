<?php
if (!defined('BASEPATH')) exit('<h1>Error 404 Not Found !</h1>');
?>
<!-- Modal -->
<div class="modal fade" id="Modal-output-dataKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Dokumentasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th class="<?= $sesion; ?>" scope="col">Nama</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">SKP</th>
                            <th scope="col">Target</th>
                            <th class="<?= $sesion; ?>">Edit</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <tbody><?php foreach ($data1 as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <th class="<?= $sesion; ?>"><?= $row['nama']; ?></th>
                                <td><?= $row['tanggal_data']; ?></td>
                                <td><?= $row['file']; ?></td>
                                <td><button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="<?= $row['uraian']; ?>">Jenis SKP
                                    </button></td>
                                <td><?= $row['target'] . ' ' . $row['satuan']; ?></td>
                                <th class="<?= $sesion; ?>">#</th>
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