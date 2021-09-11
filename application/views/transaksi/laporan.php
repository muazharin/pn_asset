<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PENGAJUAN BARANG</title>
    <style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <h4 align="center">LAPORAN BARANG (<?= strtoupper($tgl); ?>)</h4>'
    <table width="100%">
        <thead>
            <tr>
                <td style="width: 5%;" rowspan="2">No.</td>
                <td style="width: 50%;" rowspan="2">Nama Barang</td>
                <td style="width: 35%; text-align: center;" colspan="3"> Jumlah</td>
                <td style="width: 10%; text-align: center;" rowspan="2"> Satuan</td>
            </tr>
            <tr>
                <td style="text-align: center;">Pengajuan</td>
                <td style="text-align: center;">Disetujui</td>
                <td style="text-align: center;">Selisih</td>
            </tr>
        </thead>
        <tbody>
            <?php
			$i = 1;
			foreach ($laporan as $lp) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $lp->nama_asset; ?></td>
                <td style="text-align: center;"><?= $lp->jml_pengajuan; ?></td>
                <td style="text-align: center;"><?= $lp->jml_disetujui; ?></td>
                <td style="text-align: center;"><?= $lp->jml_pengajuan - $lp->jml_disetujui; ?></td>
                <td style="text-align: center;"><?= $lp->nama_satuan; ?></td>
            </tr>
            <?php $i++;
			endforeach; ?>
        </tbody>
    </table>
</body>

</html>
