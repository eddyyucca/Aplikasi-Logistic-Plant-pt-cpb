<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Laporan Logistik GTO
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                </div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Part Number</th>
                            <th>Kode GTO</th>
                            <th>Tujuan</th>
                            <th>Pengirim</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->status_gto; ?></td>
                                <td><?= $x->kode_gto_status; ?></td>
                                <td><?= $x->nama_site; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->waktu_tf; ?></td>

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

<script>
    window.print()
</script>