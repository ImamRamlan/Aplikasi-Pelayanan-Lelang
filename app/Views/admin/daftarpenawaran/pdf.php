<!-- views/admin/daftarpenawaran/pdf.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        /* Add your CSS styles for the PDF here */
    </style>
</head>

<body>
    <h1><?= $title; ?></h1>
    <div class="card-body">
        <hr class="opacity-75">
        <table style="margin-bottom: 10px;" id="nama">
            <tbody>
                <tr>
                    <td style="padding-bottom: 5px;">Nama Admin</td>
                    <td style="padding-bottom: 5px;">:</td>
                    <td style="padding-bottom: 5px;"><?= session('nama') ?></td>
                </tr>
                <tr>
                    <td style=" width: 15%; padding-bottom: 5px;">Pelayanan Lelang</td>
                </tr>
            </tbody>
        </table>
        <!-- Default Table -->
        <table style="text-align: center; border-collapse: collapse; border: 1px solid #ddd;" id="table" width="100%">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">No</th>
                    <th style="text-align:center" scope="col">Nama Lelang</th>
                    <th style="text-align:center" scope="col">User Penawaran</th>
                    <th style="text-align:center" scope="col">Harga Awal</th>
                    <th style="text-align:center" scope="col">Jumlah Penawaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($penawaran as $row) : ?>
                    <tr scope="row" id="1">
                        <td><?= $i++; ?></td>
                        <td><?= esc($row['212369_namalelang']) ?></td>
                        <td><?= esc($row['212369_nama']) ?></td>
                        <td><?= esc($row['212369_harga']) ?></td>
                        <td><?= esc($row['212369_jumlahpenawaran']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>