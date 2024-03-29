<body class="bg-gradient-success">
    <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold "> Inventory</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_order')  ?>" method="POST">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width=20%>Nama Barang</td>
                                                                    <td>
                                                                        <input type="text" value="<?= $data->mc . "-" . $data->spc ?>" class="form-control" disabled placeholder="Nama Barang">
                                                                        <input type="hidden" name="id_barang" value="<?= $data->id_log ?>" class="form-control" required placeholder="Nama Barang">
                                                                        <input type="hidden" name="mc" value="<?= $data->mc ?>" class="form-control" required placeholder="Nama Barang">
                                                                        <input type="hidden" name="spc" value="<?= $data->spc ?>" class="form-control" required placeholder="Nama Barang">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Qty</td>
                                                                    <td><input type="number" name="qty" class="form-control" value="<?= $data->qty ?>" disabled></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Jumlah Barang</td>
                                                                    <td><input type="number" name="qty" class="form-control" required placeholder="Jumlah Barang"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>unit</td>
                                                                    <td>
                                                                        <select name="kode_unit" class="form-control selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH Unit--</option>
                                                                            <?php foreach ($unit as $s) { ?>
                                                                                <option value="<?= $s->id_unit ?>"><?= $s->kode_unit ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <button class="btn btn-success">Simpan</button>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>