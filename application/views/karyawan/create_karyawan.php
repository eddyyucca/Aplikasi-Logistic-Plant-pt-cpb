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
                                <td><input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap"></td>
                            </tr>





                            <tr>
                                <td>Departement</td>
                                <td><select name="departement" class="form-control selectpicker" data-live-search="true">
                                        <option value="">--PILIH Departement--</option>
                                        <?php foreach ($dep as $departement) { ?>
                                            <option value="<?= $departement->id_dep ?>"><?= $departement->nama_dep ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td><select name="section" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH SECTION--</option>
                                        <?php foreach ($sec as $section) { ?>
                                            <option value="<?= $section->id_sec ?>"><?= $section->nama_sec ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><select name="jabatan" class="form-control  selectpicker" data-live-search="true">
                                        <option value="">--PILIH JABATAN--</option>
                                        <?php foreach ($jab as $jabatan) { ?>
                                            <option value="<?= $jabatan->id_jab ?>"><?= $jabatan->nama_jab ?></option>
                                        <?php } ?>
                                    </select></td>
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