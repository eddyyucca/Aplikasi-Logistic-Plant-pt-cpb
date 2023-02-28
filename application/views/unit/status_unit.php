<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Unit
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Unit</th>
                            <th>tipe</th>
                            <th>status Unit</th>
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
                                <td><?= $x->status_unit; ?></td>
                                <td align="center">
                                    <?php
                                    if ($x->status_unit == "ready") { ?>
                                        <a href="<?= base_url('admin/unit_bd/') . $x->id_unit ?>" class="btn btn-danger">Unit Rusak</a>
                                    <?php  } else { ?>
                                        <a href="<?= base_url('admin/unit_ready/') . $x->id_unit ?>" class="btn btn-success">Unit Ready</a>
                                    <?php
                                    }
                                    ?>
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