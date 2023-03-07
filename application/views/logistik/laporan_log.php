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
                        <th>DEPARTEMEN LOGISTIK</th>
                    </table>

                    <table class="b">
                        <tr align="left" width="600">
                            <th>Date</th>
                            <th>:</th>
                            <th><?= date('Y-m-d') ?></th>
                        </tr>
                        <tr align="left" width="600">
                            <th>SITE</th>
                            <th>:</th>
                            <th> cp2
                            </th>
                        </tr>
                    </table>

                    <table border=1 width="600px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Part Number</th>
                                <th>Spasifikasi</th>
                                <th>Jumlah</th>
                                <th>Lokasi Site</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($data as $x) { ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $x->mc; ?></td>
                                    <td><?= $x->spc; ?></td>
                                    <td><?= $x->qty; ?></td>
                                    <td><?= $x->nama_site; ?></td>

                                </tr>
                            <?php   } ?>
                        </tbody>
                    </table>
                    <br>

                    <br>
                    <table border=1 width="600px">
                        <th>Form ini digunakan sebagai dasar Stok LOGISTIK</th>
                    </table>
                </th>
            </tr>
        </table>
    </div>
</body>
<script>
    window.print()
</script>

</html>