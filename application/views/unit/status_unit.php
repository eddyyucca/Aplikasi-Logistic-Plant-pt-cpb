<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Status Unit
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_jabatan') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Jabatan</a>
                    <hr>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Unit</th>
                            <th>Spesifikasi</th>
                            <th>Lokasi Unit</th>
                            <th>Status Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->kode_unit; ?></td>
                                <td><?= $x->tipe; ?></td>
                                <td><?= $x->l_unit; ?></td>
                                <td><?= $x->status_unit; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/delete_jab/') . $x->id_unit; ?>" class="btn btn-danger">Unit Rusak</a>
                                    <a href="<?= base_url('admin/delete_jab/') . $x->id_unit; ?>" class="btn btn-danger">Unit Rusak</a>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('flash_message')) : ?>
    <script>
        swal({
            title: "Done",
            text: "<?php echo $this->session->flashdata('flash_message'); ?>",
            timer: 1500,
            showConfirmButton: false,
            type: 'success'
        });
    </script>
<?php endif; ?>