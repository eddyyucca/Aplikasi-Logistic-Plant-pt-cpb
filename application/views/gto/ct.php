<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "> Logistik GTO
            </h6>
        </div>
        <h1 align="center">Permintaan Pengiriman Barang</h1>
        <div class="card-body">
            <table>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td><?= $data2->nama_site ?></td>
                </tr>
                <tr>
                    <td>Pengirim</td>
                    <td>:</td>
                    <td><?= $data2->nama ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?= $data2->status_gto ?></td>
                </tr>
            </table>
            <div class="table-responsive">
                <div class="container">
                </div>
                <table border="1" align="center">
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
                                <td><?= $x->qty; ?></td>
                                </td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                <hr>

            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('flash_message')) : ?>
    <script>
        window.print()
    </script>
<?php endif; ?>