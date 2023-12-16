<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">DAFTAR PENAWARAN</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Daftar Penawaran</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/daftarpenawaran/create/<?= $lelang['212369_idlelang']; ?>" class="btn btn-warning">
                            <i class="fas fa-plus-square"></i> Tambah Penawaran
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <?php if (!empty($pemenang)) : ?>
                                <div class="alert alert-info mt-2">
                                    <strong>Pemenang Lelang : </strong> <?= $pemenang['212369_nama']; ?>
                                </div>
                            <?php else : ?>
                                <div class="alert alert-warning mt-2">
                                    <strong>Belum ada pemenang lelang.</strong>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
                            </div>
                        <?php endif; ?>
                        <form action="/daftarpenawaran/printPDF" method="post">
                            <div class="form-group">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat Laporan</button>
                        </form>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Lelang</th>
                                    <th>Nama User Penawaran</th>
                                    <th>Harga Awal</th>
                                    <th>Harga Penawaran</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($lelang) && !empty($penawaran)) : ?>
                                    <?php foreach ($penawaran as $row) : ?>
                                        <tr>
                                            <td><?= esc($row['212369_namalelang']) ?></td>
                                            <td><?= esc($row['212369_nama']) ?></td>
                                            <td><?= esc($row['212369_harga']) ?></td>

                                            <td><?= esc($row['212369_jumlahpenawaran']) ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/foto/' . $row['212369_gambar']) ?>" alt="Gambar Lelang" class="img-fluid" width="190" height="210">
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/daftarpenawaran/delete/' . $row['212369_idpenawaran']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6">
                                            <p><strong>Tidak ada data penawaran untuk lelang ini.</strong></p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>