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
                                                <h6 class="m-0 font-weight-bold ">Tambah Unit</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_unit')  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width=20%>Keterangan</td>
                                                                    <td>
                                                                        <input type="text" name="tipe" class="form-control" required placeholder="Tipe Unit">
                                                                        <input type="hidden" value="<?= $unit->id_unit ?>" name="unit_bd" class="form-control" required placeholder="Tipe Unit">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Mekanik</td>

                                                                    <td>
                                                                        <select name="tujuan" class="form-control selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH KARYAWAN--</option>
                                                                            <?php foreach ($karyawan as $s) { ?>
                                                                                <option value="<?= "(" . $s->nama . "-" . $s->nik . ")" ?>"><?= $s->nama_site ?></option>
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