<!-- Begin Page Content -->
<div class="container col-8 mb-3">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/data_karyawan') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_tambah_karyawan')  ?>" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td width=20%>NIK</td>
                                <td><input type="text" name="nik" class="form-control" required placeholder="NIK Lengkap"></td>
                            </tr>

                            <tr>
                                <td width=20%>Nama Lengkap</td>
                                <td><input type="text" name="nama" class="form-control" required placeholder="Nama Lengkap"></td>
                            </tr>
                            <tr>
                                <td>Departement</td>
                                <td><select name="departement" class="form-control selectpicker" data-live-search="true">
                                        <option value="">--PILIH Departement--</option>
                                        <?php foreach ($departement as $dep) { ?>
                                            <option value="<?= $dep->id_dep ?>"><?= $dep->nama_dep ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td><select name="section" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($section as $sec) { ?>
                                            <option value="<?= $sec->id_sec ?>"><?= $sec->nama_sec ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><select name="jabatan" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH JABATAN--</option>
                                        <?php foreach ($jabatan as $jab) { ?>
                                            <option value="<?= $jab->id_jab ?>"><?= $jab->nama_jab ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Lokasi Site</td>
                                <td><select name="l_kar" class="form-control selectpicker" data-live-search="true">
                                        <option value="">--PILIH Site--</option>
                                        <?php foreach ($site as $s) { ?>
                                            <option value="<?= $s->id_site ?>"><?= $s->nama_site ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td width=20%>Password</td>
                                <td><input type="password" name="password" class="form-control" required placeholder="password"></td>
                            </tr>

                            <tr>
                                <td>
                                    <button class="btn btn-primary">Simpan</button>
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