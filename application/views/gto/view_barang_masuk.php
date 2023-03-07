<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "> Logistik GTO
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
                            <th>Part Number</th>
                            <th>QTY</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->mc . "-" . $x->spc ?></td>
                                <td><?= $x->jumlah ?></td>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                <hr>
                <a class="btn btn-primary" href="<?= base_url('admin/terima/' . $kd) ?>">Terima</a>
                <a class="btn btn-danger" href="<?= base_url('admin/ditolak/' . $kd) ?>">Ditolak</a>
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