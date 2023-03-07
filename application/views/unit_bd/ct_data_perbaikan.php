<?php if ($this->session->flashdata('flash_message')) : ?>
    <script>
        window.print()
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        th .a {
            height: 50px;
            padding-left: 10px;
            vertical-align: top;

        }

        table {
            border-collapse: collapse;
        }

        tr .bungkus {
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table border="3" class="c">
            <tr>
                <th>
                    <table>
                        <tr align="left">
                            <th rowspan="2"><img src="<?= base_url('assets/cpb.png') ?>" width="50">
                            </th>
                            <th class="a">PT.Cakrawala Putra Bersama <br> BMB2 Mining Project</th>
                            <th width="295x"></th>
                        </tr>
                    </table>

                    <table border="1px" width="600px">
                        <th>LAPORAN PERBAIKAN UNIT</th>
                    </table>



                    <table border=1 width="600px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Perbaikan</th>
                                <th>Tim Mekanik</th>
                                <th>Unit Yang Diperbaiki</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($data as $x) { ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $x->waktu_perbaikan; ?></td>
                                    <td><?= $x->perbaikan; ?></td>
                                    <td><?= $x->kode_unit . "-" . $x->tipe ?></td>
                                    <td><?= $x->ket; ?></td>
                                </tr>
                            <?php   } ?>
                        </tbody>
                    </table>
                    <br>

                    <br>

                </th>
            </tr>
        </table>
    </div>
</body>
<script>
    window.print()
</script>

</html>