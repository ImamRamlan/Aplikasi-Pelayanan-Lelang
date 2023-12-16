<!-- views/admin/datauser/pdf.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>

<h1><?= $title ?></h1>

<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <!-- Add other columns as needed -->
        </tr>
    </thead>
    <tbody>
        <?= $i = 1; ?>
        <?php foreach ($datauser as $user): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $user['212369_iduser'] ?></td>
                <td><?= $user['212369_nama'] ?></td>
                <td><?= $user['212369_nik'] ?></td>
                <td><?= $user['212369_alamat'] ?></td>
                <td><?= $user['212369_jeniskelamin'] ?></td>
                <!-- Add other columns as needed -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
