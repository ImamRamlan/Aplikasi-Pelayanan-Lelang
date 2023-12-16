<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Kendaraan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
          <li class="breadcrumb-item active">Data Kendaraan</li>
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5>List Data Kendaraan</h5>
            <a href="/dataKendaraan/create" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> Tambah Kendaraan</a>
            <a href="/datakendaraan/export_pdf" class="btn btn-warning mt-3"><i class="fas fa-print"></i> CETAK</a>
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
                  <th>#</th>
                  <th>Nama Kendaraan</th>
                  <th>Kategori</th>
                  <th>Merek</th>
                  <th>Model</th>
                  <th>No. Mesin</th>
                  <th>No. Rangka</th>
                  <th>Deskripsi</th>
                  <th>Mulai Harga</th>
                  <th colspan="3" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($someData as $row) : ?>
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
                    <td>
                    <td>
                      <a href="<?= base_url('/datakendaraan/edit/' . $row['212369_idkendaraan']); ?>" class="btn btn-warning"><i class="fas fa-edit">Edit</i></a>
                      <a href="<?= base_url('/datakendaraan/delete/' . $row['212369_idkendaraan']); ?>" class="btn btn-danger"><i class="fas fa-trash" onclick="return confirm ('apakah anda yakin?');">Hapus</i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?= $pager->links('tbl_kendaraan_212369', 'pagination') ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>