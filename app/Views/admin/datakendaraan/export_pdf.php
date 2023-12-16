<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>Data Kendaraan</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kendaraan</th>
                <th>Kategori</th>
                <th>Merek</th>
                <th>Model</th>
                <th>No. Mesin</th>
                <th>No. Rangka</th>
                <th>Deskripsi</th>
                <th>Mulai Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($kendaraan as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['212369_namakendaraan'] ?></td>
                    <td><?= $row['212369_namakategori'] ?></td>
                    <td><?= $row['212369_merek'] ?></td>
                    <td><?= $row['212369_model'] ?></td>
                    <td><?= $row['212369_no_mesin'] ?></td>
                    <td><?= $row['212369_no_rangka'] ?></td>
                    <td><?= $row['212369_deskripsi'] ?></td>
                    <td><?= $row['212369_mulaiharga'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>