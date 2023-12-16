<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Data Lelang</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data Lelang</a></li>
          <li class="breadcrumb-item active">Edit Data Lelang</li>
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
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5>Edit Data Lelang</h5>
            <a href="/datalelang/index">Kembali</a>
            <?php if (session()->getFlashdata('errors')) : ?>
              <div class="card-body col-md-5">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>Data Lelang</h5>
                  <?= session()->getFlashdata('errors'); ?>
                </div>
              </div>
            <?php endif; ?>
            <?php echo form_open_multipart("/datalelang/update"); ?>
            <?= csrf_field(); ?>
            <input type="hidden" name="212369_idlelang" value="<?= $lelang['212369_idlelang']; ?>">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Lelang</label>
                  <input type="text" name="212369_namalelang" class="form-control form-control-border border-width-2" value="<?= $lelang['212369_namalelang']; ?>" autofocus required>
                </div>
                <div class="form-group">
                  <label>Waktu Mulai</label>
                  <input type="time" name="212369_waktu_mulai" class="form-control form-control-border border-width-2" value="<?= $lelang['212369_waktu_mulai']; ?>" autofocus required>
                </div>
                <div class="form-group">
                  <label>Waktu Akhir</label>
                  <input type="time" name="212369_waktu_akhir" class="form-control form-control-border border-width-2" value="<?= $lelang['212369_waktu_akhir']; ?>" autofocus required>
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" name="212369_tanggal_mulai" class="form-control form-control-border border-width-2" value="<?= $lelang['212369_tanggal_mulai']; ?>" autofocus required>
                </div>
                <div class="form-group">
                  <label>Tanggal Akhir</label>
                  <input type="date" name="212369_tanggal_akhir" class="form-control form-control-border border-width-2" value="<?= $lelang['212369_tanggal_akhir']; ?>" autofocus required>
                </div>
                <div class="form-group">
                  <label for="">Nama Kendaraan</label>
                  <select name="212369_idkendaraan_lelang" class="form-control">
                    <option value=""></option>
                    <?php foreach ($kendaraan as $ds) : ?>
                      <option value="<?= $ds['212369_idkendaraan']; ?>" <?= ($ds['212369_idkendaraan'] == $lelang['212369_idkendaraan_lelang']) ? 'selected' : ''; ?>>
                        <?= $ds['212369_namakendaraan']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" name="212369_harga" class="form-control form-control-border border-width-2" value="<?= $lelang['212369_harga']; ?>" autofocus required>
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="212369_status" class="form-control col-md-5">
                    <option value=""></option>
                    <option value="Aktif" <?= ($lelang['212369_status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="Selesai" <?= ($lelang['212369_status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                    <option value="Batal" <?= ($lelang['212369_status'] == 'Batal') ? 'selected' : ''; ?>>Batal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar Saat Ini</label>
                  <br>
                  <img src="<?= base_url('assets/foto/' . $lelang['212369_gambar']); ?>" alt="Gambar Saat Ini" width="200">
                </div>
                <div class="form-group">
                  <label for="gambar">Pilih Gambar Baru:</label>
                  <input type="file" name="212369_gambar" id="gambar" class="form-control col-md-5">
                  <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block col-md-4">Update</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>