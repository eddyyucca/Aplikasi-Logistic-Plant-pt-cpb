<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Departement</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_departement') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Departemen</a>
                    <hr>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Departemen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_dep; ?></td>
                                <td align="center">


                                    <a href="<?= base_url('admin/delete_departement/') . $x->id_dep; ?>" class="btn btn-danger">Hapus</a>
                                    <a href="<?= base_url('admin/edit_departement/') . $x->id_dep; ?>" class="btn btn-primary">Edit</a>
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