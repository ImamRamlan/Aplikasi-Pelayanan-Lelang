<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Lelang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Data Lelang</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h5>List Data Lelang</h5>
                    </div>
                    <div class="card-body">
                        <a href="/dataLelang/create" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> </a>
                        <a href="/dataLelang/export_pdf" class="btn btn-warning mt-3"><i class="fas fa-print"> CETAK</i> </a>
                        <br><br>

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

                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kendaraan</th>
                                    <th scope="col">Nama Lelang</th>
                                    <th scope="col">Waktu Mulai</th>
                                    <th scope="col">Waktu Akhir</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                                <?php foreach ($datalelang as $ds) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $ds['212369_namakendaraan']; ?></td>
                                        <td><?= $ds['212369_namalelang']; ?></td>
                                        <td><?= $ds['212369_waktu_mulai']; ?></td>
                                        <td><?= $ds['212369_waktu_akhir']; ?></td>
                                        <td><?= $ds['212369_harga'] ?></td>
                                        <td class="text-center">
                                            <a href="/dataLelang/edit/<?= $ds['212369_idlelang'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            <a href="/dataLelang/delete/<?= $ds['212369_idlelang'] ?>" class="btn btn-danger" onclick="return confirm ('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?= $ds['212369_status'] ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/datalelang/status/Aktif/<?= $ds['212369_idlelang'] ?>">Aktif</a>
                                                    <a class="dropdown-item" href="/datalelang/status/Selesai/<?= $ds['212369_idlelang'] ?>">Selesai</a>
                                                    <a class="dropdown-item" href="/datalelang/status/Batal/<?= $ds['212369_idlelang'] ?>">Batal</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>