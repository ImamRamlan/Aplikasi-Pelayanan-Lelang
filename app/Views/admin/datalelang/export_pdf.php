<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lelang - PDF Export</title>
</head>

<body>
    <h1>Data Lelang</h1>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Kendaraan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Waktu Mulai</th>
                <th>Waktu Akhir</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datalelang as $index => $lelang) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $lelang['212369_idkendaraan_lelang'] ?></td>
                    <td><?= $lelang['212369_tanggal_mulai'] ?></td>
                    <td><?= $lelang['212369_tanggal_akhir'] ?></td>
                    <td><?= $lelang['212369_waktu_mulai'] ?></td>
                    <td><?= $lelang['212369_waktu_akhir'] ?></td>
                    <td><?= $lelang['212369_harga'] ?></td>
                    <td><?= $lelang['212369_status'] ?></td>
                    <td><img src="<?= base_url('assets/foto/' . $lelang['212369_gambar']) ?>" alt="Gambar" width="100"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
