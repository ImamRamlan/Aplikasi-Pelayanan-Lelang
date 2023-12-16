<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Data Kendaraan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data Kendaraan</a></li>
          <li class="breadcrumb-item active">Edit Data Kendaraan</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <a href="/dataKendaraan">Kembali</a>
          <?php if (session()->getFlashdata('error')) : ?>
            <div class="card-body col-md-5">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Error</h5>
                <?= session()->getFlashdata('error'); ?>
              </div>
            </div>
          <?php endif; ?>
          <form action="/datakendaraan/update/<?= $kendaraan['212369_idkendaraan']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label>Nama Kendaraan</label>
                <input type="text" name="212369_namakendaraan" class="form-control" value="<?= $kendaraan['212369_namakendaraan']; ?>" autofocus>
              </div>
              <div class="form-group col-md-5">
                <label for="">Kategori Kendaraan</label>
                <select name="212369_idkategori" class="form-control">
                  <option value="">--Pilih Kategori--</option>
                  <?php foreach ($kategori as $item) : ?>
                    <option value="<?= $item['212369_idkategori']; ?>" <?= ($item['212369_idkategori'] == $kendaraan['212369_idkategori']) ? 'selected' : ''; ?>><?= $item['212369_namakategori']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label for="">Penjual</label>
                <select name="212369_iduser_penjual" class="form-control select2bs4">
                  <option value="">--Penjual--</option>
                  <?php foreach ($user as $ds) : ?>
                    <option value="<?= $ds['212369_iduser']; ?>" <?= ($ds['212369_iduser'] == $kendaraan['212369_iduser_penjual']) ? 'selected' : ''; ?>><?= $ds['212369_nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Merek Kendaraan</label>
                <input type="text" name="212369_merek" class="form-control" value="<?= $kendaraan['212369_merek']; ?>">
              </div>
              <div class="form-group">
                <label>Model Kendaraan</label>
                <input type="text" name="212369_model" class="form-control" value="<?= $kendaraan['212369_model']; ?>">
              </div>
              <div class="form-group">
                <label>No Mesin Kendaraan</label>
                <input type="number" name="212369_no_mesin" class="form-control" value="<?= $kendaraan['212369_no_mesin']; ?>">
              </div>
              <div class="form-group">
                <label>No Rangka Kendaraan</label>
                <input type="number" name="212369_no_rangka" class="form-control" value="<?= $kendaraan['212369_no_rangka']; ?>">
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="212369_deskripsi" class="form-control"><?= $kendaraan['212369_deskripsi']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Mulai Harga</label>
                <input type="text" name="212369_mulaiharga" class="form-control" value="<?= $kendaraan['212369_mulaiharga']; ?>">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>
