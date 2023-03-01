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
                        foreach ($keranjang as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x['item'] . "-" . $x['name'] ?></td>
                                <td><?= $x['qty']; ?></td>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                <hr>
                <form action="<?= base_url('admin/cart_gto_tf') ?>" method="post">
                    <tr>
                        <td>
                            Trasfer Ke :
                        </td>
                        <td>
                            <select name="id_site" class="form-control selectpicker" data-live-search="true">
                                <option value="">--PILIH Site--</option>
                                <?php foreach ($site as $s) { ?>
                                    <option value="<?= $s->id_site ?>"><?= $s->nama_site ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <hr>
                    <button class="btn btn-primary">Transfer</button>
                </form>
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